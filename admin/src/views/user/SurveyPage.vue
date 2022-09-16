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
        convertedAnswers: {},
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
          // this.questions.forEach(element => {
          //   this.answers["answer" + element.id] = "aba" + element.id;
          // });
          // console.log(this.answers);

          //   for (let key of Object.keys(this.answers)) {
          //       let prop = key;
          //       let val = this.answers[key];

          //       prop = "question id";
          //       val = "valeur"

          //       console.log(prop);
          //       console.log(val);
          //       // use val
          //   }

          this.questions.forEach(element => {
            if(element.type_question == "C"){
              this.answers.push({
                'questionId': element.id,
                'answer': 1
              });
            }
            else{
              this.answers.push({
                'questionId': element.id,
                'answer': ''
              });
            }
          });
          // this.answers = Object.assign(this.answers, this.answers);
          // let arrConverted = {}; 

          // print object
        }).catch(error => console.log(error))
      },

      async saveSurvey(){
        this.errors = [];
        this.answers.forEach(element => {
          this.convertedAnswers[element.questionId] = element.answer;
        });
        // console.log(this.answers);
        // console.log(this.convertedAnswers);
        // this.answers[0]['email'] = this.answers[0]['answer'];
        // this.answers[0]['answer'] = "test";
        // delete this.answers[0]['answer'];
        // console.log(this.answers);
        let formData = {answers : this.convertedAnswers};
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