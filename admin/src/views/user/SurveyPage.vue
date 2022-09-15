<template>
    <div>
      <HeaderUser />
      <form @submit.prevent="saveSurvey">
        <el-row>
          <el-col :span="16" :offset="4" v-for="question in questions" :key="question.numQuestion">
            <SurveyCard :question="question" v-on:answerToAnswers="getAnswers"/>
          </el-col>
          <el-col>
            <el-button type="submit" v-on:click="saveSurvey()">Primary</el-button>
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
      }
    },
    methods: {
      async getQuestions() {
        let url = 'http://127.0.0.1:8000/api/getQuestionsSurvey'
        await axios.get(url).then(response =>{
          console.log(response);
          this.questions = response.data;
        for (let i= 1 ; i < 21 ; i++) {
          this.answers.push({
            'questionId': i,
            'answer': ''
          });
        }
        console.log(this.answers);
        }).catch(error => console.log(error))
      },
      getAnswers(value){
        console.log(value);
        this.answers.forEach(el => {
          if(el['questionId'] == value['questionId']){
            el['answer'] = value['answer'];
          }
        });
        console.log(this.answers);
      },
      // saveSurvey(){
      //     console.log(this.answers);
      // },
    },
    mounted() {
       this.getQuestions();
    }
}

</script>

<style>
</style>