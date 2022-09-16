<template>
    <div>
      <HeaderUser />
      <form  @submit.prevent="saveSurvey" novalidate>
        <el-row>
          <el-col :span="16" :offset="4" v-for="question in questions" :key="question.id">
            <SurveyCard :question="question" :answers="answers"/>
          </el-col>
          <el-col>

            <span v-if="errors.length">
              <span v-for="(error, index) in errors" :key="index">
                <el-alert v-bind:title=error type="error" show-icon />
              </span>
            </span>

            <span v-if="successMessage">
              <el-dialog v-model="dialogTableVisible" title="Sondage validé">
                <el-descriptions>
                  <el-descriptions-item>
                    <p>Toute l’équipe de Bigscreen vous remercie pour votre engagement.</p>
                    <p>Grâce à votre investissement, nous vous préparons une application toujours plus
                    facile à utiliser, seul ou en famille.</p>
                    <p>Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
                    cette adresse: 
                    <router-link :to="{ name:'SurveyResult', params: { token: answerUserToken} }">
                      test
                    </router-link>
                    </p>
                  </el-descriptions-item>
                </el-descriptions>
              </el-dialog>
            </span>

            <el-button type="primary" native-type="submit">Finaliser</el-button>
          </el-col>
        </el-row>
      </form>
    </div>
</template>

<script>
import HeaderUser from '@/components/HeaderUser.vue';
import SurveyCard from '@/components/SurveyCard.vue';
import axios from 'axios';

export default {
    components: { HeaderUser, SurveyCard },
    data() {
      return {
        questions: [],
        answers: [],
        errors: [],
        successMessage: false,
        dialogTableVisible: '',
        answerUserToken: '',
      }
    },
    methods: {
      async getQuestions() {
        let url = 'http://127.0.0.1:8000/api/getQuestionsSurvey'
        await axios.get(url).then(response =>{
          console.log(response.data);
          this.questions = response.data;
          this.questions.forEach(element => {
            this.answers.push({
              'questionId': element.id,
              'answer': ''
            });
          });
        }).catch(error => console.log(error))
      },

      async saveSurvey(){
        this.errors = [];
        console.log(this.answers);
        // let formData = new FormData();
        // this.answers.forEach(element => {
        //   formData.append('answers[]', JSON.stringify(element));
        // });
        let formData = {answers : this.answers};
        let url = 'http://127.0.0.1:8000/api/saveQuestionsSurvey';
        await axios.post(url, formData).then((response) =>{
            if(response.status == 200){
                console.log(response.data);
                if(response.data.validatedMail){
                  this.successMessage = true;
                  this.dialogTableVisible = true;
                  this.answerUserToken = response.data.answerUser['token'];
                  console.log(this.errors);
                }
                else{
                  this.errors.push("Format d'addresse mail incorrect");
                }
            }
          });
      },
    },
    mounted() {
       this.getQuestions();
    }
}

</script>

<style>
</style>