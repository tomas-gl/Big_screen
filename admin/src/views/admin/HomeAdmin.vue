<template>
  <div>
    <SideNavBar />
    <div>
     <h1>Home Admin</h1>
    </div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <div class="container"><canvas></canvas></div>
    <router-view />
  </div>

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';
import axios from 'axios';

export default {
    components: { SideNavBar },
    data() {
        return {
            datas:{},
        }
    },
    methods: {
        async getSurveyDatas(){
            let url = 'http://127.0.0.1:8000/api/getSurveyDatas'
            await axios.get(url).then(response =>{
                this.datas = response.data;
                console.log(this.datas);
            }).catch(error =>{
                console.log(error);
            });
        },
    },
    mounted() {
        this.getSurveyDatas();
  }
}
</script>

<style>

</style>