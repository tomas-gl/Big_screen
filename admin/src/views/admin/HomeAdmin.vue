<template>
  <div>
    <SideNavBar />
    <el-row>
      <el-col :span="24">
          <h1>Home Admin</h1>
      </el-col>
    </el-row>
  </div>

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';
import axios from 'axios';

export default {
    components: { SideNavBar },
    data(){
    return{
      datas:{},
    }
  },
  methods:{
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
.el-row{
  margin-left: 200px;
}
</style>