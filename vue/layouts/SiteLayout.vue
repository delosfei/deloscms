<template>
    <top-menu />
    <quick-menu />
    <div>
        <router-view/>
    </div>
</template>

<script>
// 引入组件
import TopMenu from "./components/TopMenu";
import QuickMenu from "./components/QuickMenu";
export default {
    route: {meta: {auth: true}},
    // 注册组件
    components: { TopMenu, QuickMenu }
};
</script>

<style>
</style>
