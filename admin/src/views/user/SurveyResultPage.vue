<template>
    <div>
        <HeaderUser />
        <el-row v-for="answer in answers" :key="answer.id">
            <el-col :span="16" :offset="4">
                <el-card class="box-card">
                    <h2>Question {{answer.num_question}}/20</h2>
                    <p>{{answer.question}} :</p>
                    <div class="options">
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

export default {
    components: { HeaderUser,  },
    data(){
        return {
            answers: [],
        }
    },
    methods:{
        
        async getSurveyResultsById(){ 
            let url = `http://127.0.0.1:8000/api/getSurveyResult/${this.$route.params.token}`;
                await axios.get(url).then(response =>{
                    console.log(response.data);
                    this.answers = response.data;
            }).catch(error => console.log(error));
        },
    },
    mounted() {
       this.getSurveyResultsById();
    }
}

</script>

<style>
</style>