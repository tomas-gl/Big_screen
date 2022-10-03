<template>
    <SideNavBar />
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