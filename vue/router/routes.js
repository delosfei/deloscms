import groups from "./groups";

const components = require.context("@/views", true, /\.vue$/);

components.keys().forEach(path => {
    const component = components(path).default;
    //组件的route属性为false时不注册到路由
    if (component.route !== false) {
        path = path.slice(2, -4);
        //组名称
        const groupName = path.match(/(.+?)\//)[1];
        //子路由的路径
        path = path.slice(groupName.length);
        //转路由为小写
        path = path
            .replace(/(?<!\/)([A-Z])/, (...args) => {
                return "-" + args[1].toLowerCase();
            })
            .toLowerCase()
            .slice(1);

        //添加到路由组
        const route = { path, component };
        groups[groupName].children.push(
            Object.assign(route, component.route || {})
        );
    }
});

export default Object.values(groups);
