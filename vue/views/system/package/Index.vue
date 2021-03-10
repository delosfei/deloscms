<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <hd-package :packages.sync="packages" #default="{package:p}">
            <el-button-group>
                <el-button
                    type="primary"
                    size="mini"
                    @click="route('system.package.edit', { id: p.id })"
                >编辑
                </el-button
                >
                <el-button
                    :type="!p.permissions.delete ? 'info' : 'danger'"
                    size="mini"
                    @click="del(p)"
                    :disabled="!p.permissions.delete"
                >
                    删除
                </el-button>
            </el-button-group>
        </hd-package>
    </div>
</template>

<script>
import tabs from "./tabs";

const columns = [
    {id: "id", label: "编号", width: 100},
    {id: "title", label: "套餐名称"}
];
export default {
    data() {
        return {
            tabs,
            columns,
            packages: []
        };
    },
    async created() {
        this.packages = await this.axios.get(`package`);
    },
    methods: {
        async del(p) {
            this.$confirm(`确定删除【${p.title}】套餐吗？`, "温馨提示").then(
                async () => {
                    await this.axios.delete(`package/${p.id}`);
                    this.packages.splice(this.packages.indexOf(p), 1);
                }
            );
        }
    }
};
</script>

<style></style>
