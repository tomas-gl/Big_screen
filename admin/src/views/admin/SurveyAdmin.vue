<template>
  <div>
    <SideNavBar />
    <el-row justify="center">
      <el-col :xs="20" :sm="18" :lg="16">
        <span class="title-page">Questionnaire</span>
        <el-table :data="questions" style="width: 100%">
          <el-table-column prop="num_question" label="N° question" width="120"/>
          <el-table-column prop="question" label="Corps"/>
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
      }
    },
     methods:{
      async getSurveyDatas(){
              let url = 'http://127.0.0.1:8000/api/getSurveyDatas'
              await axios.get(url).then(response =>{
                  this.questions = response.data.questions;
                  this.questions.forEach(element => {
                    Object.assign({}, element);
                  });
                  console.log(this.questions);
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
  @media (max-width: 768px){
  .el-row{
    margin-left: 0px;
  }
}
.title-page{
    display: block;
    margin: 1rem;
    font-size: 2rem;
}
</style>