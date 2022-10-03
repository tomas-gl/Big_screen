<template>
    <SideNavBar />
    <div>
     <h1>Home Admin</h1>
    </div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <router-view />

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';

export default {
    components: { SideNavBar },
    data() {
        return {
            // data for charts

        }
    },
    methods: {

    },
    mounted() {

    }
}
</script>

<style>

</style>