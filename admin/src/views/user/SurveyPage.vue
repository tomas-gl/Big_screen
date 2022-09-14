<template>
    <div>
        <HeaderUser />
        <el-row>
          <el-col :span="24" v-for="question in questions" :key="question.numQuestion">
            <SurveyCard :numQuestion="question.numQuestion" :corpsQuestion="question.corpsQuestion"/>
          </el-col>
        </el-row>
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
        question: [],
        questions: 
          [
            {
              numQuestion: 1,
              corpsQuestion: 'Corps 1',
              typeQuestion: 'A',
              seededAnswers: ['a', 'b', 'c']
            },
            {
              numQuestion: 2,
              corpsQuestion: 'Corps 2'
            },
            {
              numQuestion: 3,
              corpsQuestion: 'Corps 3'
            }
          ],
      }
    },
    methods: {
      async getQuestions() {
        let url = 'http://127.0.0.1:8000/api/getQuestionsSurvey'
        await axios.get(url).then(response =>{
          console.log(response);
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