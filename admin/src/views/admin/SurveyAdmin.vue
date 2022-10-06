<template>
  <div>
    <SideNavBar />
    <el-row justify="center">
      <el-col :xs="20" :sm="18" :lg="16">
        <span class="title-page">Questionnaire</span>
        <el-table v-loading="loading"
                  element-loading-text="Chargement du questionnaire..." 
                  :data="questions"
                  style="width: 100%"
                  setScrollLeft="left"
                  :stripe="stripe"
                  :border="border">
          <el-table-column prop="num_question" label="N° question" width="120"/>
          <el-table-column prop="question" label="Corps" min-width="200"/>
          <el-table-column prop="type_question" label="Type" width="100"/>
        </el-table>
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
        questions: [],
        stripe: true,
        border: true,
        loading: true
      }
    },
     methods:{

      // Récupère les données des sondages
      async getSurveyDatas(){
              let url = 'http://127.0.0.1:8000/api/getSurveyDatas'
              await axios.get(url).then(response =>{
                  this.questions = response.data.questions;
                  this.loading = false;
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

<style scoped>
.el-row{
  margin-left: 200px;
}
  @media (max-width: 768px){
  .el-row{
    margin-left: 0px;
  }
}
</style>