<template>
    <div class="admin">
        <top-menu />
        <quick-menu />
        <div class="border p-4 rounded-sm bg-white mx-5 mt-10">
            <router-view />
        </div>
    </div>
</template>

<script>
import TopMenu from "./components/TopMenu";
import QuickMenu from "./components/QuickMenu";
export default {
    route: { meta: { auth: true } },
    components: { TopMenu, QuickMenu }
};
</script>

<style></style>
