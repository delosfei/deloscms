<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <el-table :data="groups" border stripe>
            <el-table-column
                v-for="col in columns"
                :prop="col.id"
                :key="col.id"
                :label="col.label"
                :width="col.width"
            >
            </el-table-column>
            <el-table-column label="套餐" #default="{row:g}">
                <el-tag
                    v-for="p in g.packages"
                    :key="p.id"
                    class="mr-2 cursor-pointer"
                    size="mini"
                    @click="route('system.package.edit', { id: p.id })"
                >
                    {{ p.title }}
                </el-tag>
            </el-table-column>
            <el-table-column width="150" align="center" #default="{row:g}">
                <el-button-group>
                    <el-button
                        type="primary"
                        size="mini"
                        @click="route('system.group.edit', { id: g.id })"
                    >编辑
                    </el-button
                    >
                    <el-button
                        :type="g.id == 1 ? 'info' : 'danger'"
                        size="mini"
                        @click="del(g)"
                        :disabled="g.id == 1"
                    >
                        删除
                    </el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from "./tabs";

const columns = [
    {id: "id", label: "编号", width: 100},
    {id: "title", label: "会员组名称"},
    {id: "site_num", label: "站点数量"},
    {id: "days", label: "可用天数"}
];
export default {
    data() {
        return {
            tabs,
            columns,
            groups: []
        };
    },
    async created() {
        this.groups = await this.axios.get(`group`);
    },
    methods: {
        async del(g) {
            this.$confirm(`确定删除【${g.title}】会员组吗？`, "温馨提示").then(
                async () => {
                    await this.axios.delete(`group/${g.id}`);
                    this.groups.splice(this.groups.indexOf(g), 1);
                }
            );
        }
    }
};
</script>

<style></style>
