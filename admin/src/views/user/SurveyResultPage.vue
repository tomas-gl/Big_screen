<template>
    <div>
        <HeaderUser />
        <p>Vous trouverez ci-dessous les réponses au sondage réalisé le {{format_date(surveyDate) }}</p>
        <el-row v-for="answer in answers" :key="answer.id" justify="center">
            <el-col  :xs="20" :sm="18" :lg="16">
                <el-card class="box-card">
                    <span>Question {{answer.num_question}}/20</span>
                    <p class="corps_question">{{answer.question}}</p>
                    <div class="answers">
                        <p>{{answer.answer}}</p>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>

<script>
import HeaderUser from '@/components/HeaderUser.vue';
import axios from 'axios';
import moment from 'moment';

export default {
    components: { HeaderUser,  },
    data(){
        return {
            answers: [],
            surveyDate: '',
        }
    },
    methods:{
        
        //  Affiche les réponses pour un sondage
        async getSurveyResultsById(){ 
            let url = `http://127.0.0.1:8000/api/getSurveyResult/${this.$route.params.token}`;
                await axios.get(url).then(response =>{
                    this.answers = response.data[0];
                    this.surveyDate = response.data[1];
            }).catch(error => console.log(error));
        },

        //  Formatte une date
        format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY/MM/DD')
          }
      },
    },
    mounted() {
       this.getSurveyResultsById();
       this.format_date();
    }
}

</script>

<style scoped>
    .answers{
        border: solid 1px white;
        border-style: dashed;
        padding: 1rem;
    }
</style>