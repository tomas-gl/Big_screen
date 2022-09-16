<template>
    <div>
      <HeaderUser />
      <form  @submit.prevent="saveSurvey" novalidate>
        <el-row>
          <el-col :span="16" :offset="4" v-for="question in questions" :key="question.numQuestion">
            <SurveyCard :question="question" :answers="answers"/>
          </el-col>
          <el-col>
            <span v-if="errors.length">
              <el-alert title="{{error}}" type="error"/>
            </span>
            <el-button type="primary" native-type="submit">Primary</el-button>
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
          console.log(this.answers);
        }).catch(error => console.log(error))
      },

      async saveSurvey(){
        console.log(this.answers);
        let formData = new FormData();
        this.answers.forEach(element => {
          formData.append('answers[]', JSON.stringify(element));
        });
        let url = 'http://127.0.0.1:8000/api/saveQuestionsSurvey';
        await axios.post(url, formData).then((response) =>{
            if(response.status == 200){
                console.log(response);
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