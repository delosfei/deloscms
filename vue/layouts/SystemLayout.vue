<template>
    <div class="admin pb-36">
        <top-menu/>
        <quick-menu/>
        <div class="border p-4 rounded-sm bg-white mx-5 mt-10">
            <router-view/>
        </div>
        <x-footer/>
    </div>
</template>

<script>
import TopMenu from "./components/TopMenu";
import QuickMenu from "./components/QuickMenu";
import XFooter from "./components/Footer";

export default {
    route: {meta: {auth: true}},
    components: {TopMenu, QuickMenu, XFooter}
};
</script>

<style></style>
