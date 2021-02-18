<template>
    <div
        class="mx-5 flex flex-col justify-between items-center md:flex-row mt-8"
    >
        <div class="w-3/12 hidden md:block">
            <img src="/images/logo.png" class="object-cover" />
        </div>
        <div class="w-full md:w-2/12 grid gap-2 grid-flow-col">
            <router-link
                :to="menu.to"
                v-for="(menu, index) in menus"
                :key="index"
                class="cursor-pointer opacity-60 hover:opacity-95 duration-300 flex flex-col justify-center items-center bg-white rounded-md border shadow-sm p-3"
            >
                <i class="text-xl" :class="menu.icon"></i>
                {{ menu.title }}
            </router-link>
        </div>
    </div>
</template>

<script>
const menus = [
    { title: "站点管理", to: "/admin", icon: "fas fa-calendar-check" },
    { title: "系统设置", to: "", icon: "fas fa-cloud" },
    { title: "退出登录", to: "", icon: "fas fa-user-alt" },
];
export default {
    data() {
        return { menus };
    },
};
</script>

<style>
</style>
