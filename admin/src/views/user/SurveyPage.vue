<template>
    <div>
      <HeaderUser />
      <el-row justify="center">
        <el-col :xs="23" :sm="21" :lg="19" class="intro">
          <p>
            Bigscreen est une entreprise développant une application VR
            permettant aux utilisateurs de regarder en VR des films, émissions TV et jeux vidéos sur un écran géant virtuel, seul ou à plusieurs.
          </p>
          <p>
            Afin de préparer la prochaine itération de son application, Big Screen souhaiterait récolter des informations
            de votre part via ce sondage.
          </p>
        </el-col>
      </el-row>
      <form  @submit.prevent="saveSurvey" novalidate class="form">
        <span v-if="!questions.length">
          <p>Chargement du questionnaire... </p>
          <el-icon class="loading"><Loading /></el-icon>
        </span>
        <el-row v-for="question in questions" :key="question.id" justify="center">
          <el-col :xs="20" :sm="18" :lg="16">
            <SurveyCard :question="question" :answers="answers"/>
          </el-col>
        </el-row>

        <el-row>
          <el-col :span="12" :offset="6">

            <span v-if="errors.length">
              <span v-for="(error, index) in errors" :key="index">
                <el-alert v-bind:title=error type="error" show-icon class="errorMessage"/>
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
                      <p>http:/localhost:8080/surveyresult/{{answerUserToken}}</p>
                    </router-link>
                    </p>
                  </el-descriptions-item>
                </el-descriptions>
              </el-dialog>
            </span>
            <el-button type="primary" native-type="submit" size="large" class="send">
              Finaliser <el-icon class="send_icon"><Promotion /></el-icon>
            </el-button>
          </el-col>
        </el-row>
      </form>
    </div>
</template>

<script>
import HeaderUser from '@/components/HeaderUser.vue';
import SurveyCard from '@/components/SurveyCard.vue';
import {Promotion} from '@element-plus/icons-vue';
import axios from 'axios';

export default {
    components: { HeaderUser, SurveyCard, Promotion },
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
        }).catch(error => console.log(error))
      },

      async saveSurvey(){
        this.errors = [];
        this.answers.forEach(element => {
          this.convertedAnswers[element.questionId] = element.answer;
        });
        console.log(this.convertedAnswers);
        let formData = {answers : this.convertedAnswers};
        let url = 'http://127.0.0.1:8000/api/saveQuestionsSurvey';
        await axios.post(url, formData).then((response) =>{
            if(response.status == 200){
                console.log(response.data);
                if(response.data.validatorErrors){
                  this.errors.push(response.data.validatorErrors);
                  console.log(this.errors);
                }
                else{
                  this.successMessage = true;
                  this.dialogTableVisible = true;
                  this.answerUserToken = response.data.answerUser['token'];
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

<style scoped>
.intro{
    box-shadow: 0 15px 30px 1px #8080805e !important;
    background-color: rgba(35 38 47 / 70%) !important;
    border-radius: 5px;
    padding: 2rem;
    margin-bottom: 2rem;
    font-size: 1.25rem;
    text-align: left;
    line-height: 1.5;
}

.form{
  margin: 1rem 0rem 15rem 0rem;
}
.send{
  font-size: 1.25rem !important;
  padding: 1.5rem 2rem !important;
}
.send_icon{
    margin: 0rem 0rem 0rem 1rem !important;
}
.el-button{
  transition: 0.5s ease !important;
}
</style>