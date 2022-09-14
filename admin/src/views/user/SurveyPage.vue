<template>
  <div>
    <HeaderUser />
    <div v-for="question in questions" :key="question.num_question">
      <div v-if="question.type_question === 'A'">
        <SurveyCard :num_question="question.num_question" :question="question.question" :type_question="question.type_question" :possible_answers="question.possible_answers"/>
      </div>
      <div v-if="question.type_question === 'B'">
        <SurveyCard :num_question="question.num_question" :question="question.question" :type_question="question.type_question"/>
      </div>
      <div v-if="question.type_question === 'C'">
        <SurveyCard :num_question="question.num_question" :question="question.question" :type_question="question.type_question"/>
      </div>
    </div>
    
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
        questions: []
      }
    },
    methods: {
      async getQuestions() {
        let url = 'http://127.0.0.1:8000/api/getQuestionsSurvey'
        await axios.get(url).then(response =>{
          this.questions = response.data;
          console.log(this.questions);
        }).catch(error => console.log(error))
      }
    },
    mounted() {
       this.getQuestions();
    }
}

</script>

<style>
  
</style>