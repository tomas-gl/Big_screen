<template>
  <div>
    <SideNavBar />
    <el-row justify="center">
      <el-col :xs="20" :sm="18" :lg="16">
        <span class="title-page">Liste des sondages réalisés</span>
        <span v-if="!answersByUser.length">
          <p>Chargement des sondages... </p>
           <el-icon class="loading"><Loading /></el-icon>
        </span>
        <div v-for="answers in answersByUser" :key="answers.id">
          <span class="sondage_number">Sondage n° {{answers[0].answer_user_id}}</span>
          <el-table :data="answers" setScrollLeft="left" :stripe="stripe" :border="border">
            <el-table-column prop="num_question" label="N° question" width="120"/>
            <el-table-column prop="question" label="Corps" min-width="200"/>
            <el-table-column prop="answer" label="Réponse" width="200"/>
          </el-table>
        </div>
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
        answersByUser: [
        ],
        stripe: true,
        border: true,
      }
    },
     methods:{
      async getSurveyDatas(){
              let url = 'http://127.0.0.1:8000/api/getSurveyDatas'
              await axios.get(url).then(response =>{
                console.log(response.data);
                  this.answersByUser = response.data.answersByUser;
                  console.log(this.answersByUser);
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

.sondage_number{
  display: block;
  text-align: left;
}
</style>