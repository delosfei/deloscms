<template>
    <div>
        <hd-tab :tabs="tabs"/>

        <el-form
            :model="form"
            ref="form"
            label-width="80px"
            size="normal"
            v-loading="loading"
        >
            <el-form-item label="网站名称">
                <el-input v-model="form.title"></el-input>
            </el-form-item>
            <el-form-item label="网站标志">
                <hd-image v-model="form.logo"/>
            </el-form-item>
            <el-form-item label="版权信息">
                <el-input type="textarea" v-model="form.copyright"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit" v-loading="submit">保存提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
import tabs from "./tabs";

const form = {logo: ""};
export default {
    data() {
        return {tabs, form, loading: true, submit: false};
    },
    async created() {
        this.form = await this.axios.get(`system/config/1`);
        this.loading = false;
    },
    methods: {
        async onSubmit() {
            this.submit = true;
            await this.axios.post(`system/config`, this.form);
            this.submit = false;
            this.route("system.home");
        }
    }
};
</script>

<style></style>
