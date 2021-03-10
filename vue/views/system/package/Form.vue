
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
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">
                        保存资料
                    </el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
import tabs from "./tabs";

const form = {title: ""};
export default {
    route: false,
    props: ["id"],
    data() {
        return {tabs, form};
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`package/${this.id}`);
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `package/${this.id}` : "package";
            await this.axios[this.id ? "put" : "post"](url, this.form);
            this.route("system.package.index");
        }
    }
};
</script>

<style></style>
