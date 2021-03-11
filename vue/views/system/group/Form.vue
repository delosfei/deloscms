<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <el-form
            :model="form"
            ref="form"
            label-width="80px"
            :inline="false"
            size="normal"
        >
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    套餐资料
                </div>
                <el-form-item label="套餐名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title"/>
                </el-form-item>
                <el-form-item label="可用天数">
                    <el-input v-model="form.days"></el-input>
                    <hd-error name="days"/>
                </el-form-item>
                <el-form-item label="站点数量">
                    <el-input v-model="form.site_num"></el-input>
                    <hd-error name="site_num"/>
                </el-form-item>
            </el-card>

            <el-card
                shadow="always"
                :body-style="{ padding: '20px' }"
                class="mt-3"
            >
                <div slot="header">
                    套餐选择
                </div>
                <hd-package :packages.sync="packages" #default="{package:p}">
                    <el-button
                        type="info"
                        size="mini"
                        v-if="!p.selected"
                        @click="p.selected = true"
                    >
                        选择套餐
                    </el-button>
                    <el-button
                        v-else
                        type="danger"
                        size="mini"
                        @click="p.selected = false"
                    >
                        取消选择
                    </el-button>
                </hd-package>
            </el-card>

            <el-button type="primary" @click="onSubmit" class="mt-3">
                保存资料
            </el-button>
        </el-form>
    </div>
</template>

<script>
import tabs from "./tabs";

const form = {title: "", site_num: 3, days: 60, packages: []};
export default {
    route: false,
    props: ["id"],
    data() {
        return {tabs, form, packages: []};
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`group/${this.id}`);
        const packages = await this.axios.get(`package`);
        packages.map(p => {
            p.selected = this.form.packages.some(pa => pa.id == p.id);
        });
        this.packages = packages;
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `group/${this.id}` : "group";
            this.form.packages = this.packages
                .filter(p => p.selected)
                .map(p => p.id);
            await this.axios[this.id ? "put" : "post"](url, this.form);
            this.route("system.group.index");
        },
        add(p) {
            this.form.packages.push(p);
        },
        del(p) {
            this.form.packages.splice(this.packages.indexOf(p, 1));
        }
    }
};
</script>

<style></style>
