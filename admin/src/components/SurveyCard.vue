<template>
  <el-card class="box-card">
    <template #header><h2>Question {{ num_question }}/20</h2></template>
    
    <p>{{corps_question}}</p>
    <div v-if="type_question == 'A'">
      <el-input
        @change="getAnswer(num_question)"
        v-model="answer"
        type="textarea"
        placeholder="Please text"
      />
    </div>
    <!--<div v-else-if="type_question == 'B'">
      <el-input
        @change="getAnswer(num_question)"
        v-model="answer"
        type="email"
        placeholder="Please email"
      />
    </div>-->
  </el-card>
</template>

<script>
export default {
    props: ['question'],
    //props: ['numQuestion', 'corpsQuestion', 'typeQuestion'],
    //emits: ["getAnswer"],
    data() {
      return {
        num_question: this.question.num_question,
        corps_question: this.question.question,
        type_question: this.question.type_question,
        possible_answers: this.question.possible_answers,
        answer: '',
      }
    },
    methods:{
      getAnswer(value){
        this.$emit('answerToAnswers', {'questionId' : value, 'answer' : this.answer})
      }
    }
}
</script>

<style>
    h2 {
      text-align: center;
    }
    .box-card {
      box-shadow: 0 15px 30px 1px grey;
      background: rgba(255, 255, 255, 0.90);
      border-radius: 5px;
      color: black;
      margin: 5em auto;
    }
</style>