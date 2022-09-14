<template>
  <el-card class="box-card">
    <h2>Question {{ numQuestion }}/20</h2>
    <p>{{corpsQuestion}}</p>
    <div v-if="typeQuestion == 'A'">
      <el-input
        @change="getAnswer(numQuestion)"
        v-model="answer"
        type="textarea"
        placeholder="Please text"
      />
    </div>
    <div v-else-if="typeQuestion == 'B'">
      <el-input
        @change="getAnswer(numQuestion)"
        v-model="answer"
        type="email"
        placeholder="Please email"
      />
    </div>
  </el-card>
</template>

<script>
export default {
    props: ['numQuestion', 'corpsQuestion', 'typeQuestion'],
    emits: ["getAnswer"],
    data() {
      return {
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
      text-align: left;
    }
    .box-card {
      box-shadow: 0 15px 30px 1px grey;
      background: rgba(255, 255, 255, 0.90);
      border-radius: 5px;
      color: black;
      margin: 5em auto;
    }
</style>