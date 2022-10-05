<template>
  <el-card class="box-card">
      <span>Question {{ num_question }}/20</span>
      <p class="corps_question">{{corps_question}}</p>
      <div class="options">
          <div v-if="type_question == 'A'" class="typeA">
            <el-radio-group v-model="user_answer">
              <el-radio :label="possible_answer"
                @change="getAnswer(id_question)"
                size="large"
                v-for="possible_answer in possible_answers"
                :key="possible_answer">
              </el-radio>
            </el-radio-group>
          </div>
          <div v-if="type_question == 'B'" class="typeB">
              <el-input type="text"
              @change="getAnswer(id_question)"
              maxlength="255"
              placeholder="Ecrivez votre réponse ici"
              v-model="user_answer"
              class="option"/>
          </div>
          <div v-if="type_question == 'C'" class="typeC">
              <p>{{user_answer}}/5</p>
              <div class="slider">
                <span>1</span>
                  <el-slider
                  @change="getAnswer(id_question)"
                  :step="1" 
                  :min="1"
                  :max="5"
                  v-model="user_answer"
                  class="option"/>
                <span>5</span>
              </div>
          </div>
      </div>
  </el-card>
</template>

<script>
export default {
    props: ['question', 'answers'],
    data() {
      return {
        id_question: this.question.id,
        num_question: this.question.num_question,
        corps_question: this.question.question,
        type_question: this.question.type_question,
        possible_answers: this.question.possible_answers,
        user_answer: this.user_answer,
      }
    },
    methods:{
      getAnswer(value){
        this.answers.forEach(el => {
          if(el['questionId'] == value){
            el['answer'] = this.user_answer;
          }
        });
      },
      answerCleaning(possible_answers) {
        let cleaned_answers = possible_answers.split(",")
        .map(answer => {
            answer = answer.trim()
            answer = answer.charAt(0).toUpperCase() +answer.slice(1)
            return answer
        })
        this.possible_answers = cleaned_answers
      },
    },
    mounted() {
        this.answerCleaning(this.possible_answers)
    }
}
</script>

<style>
    .slider{
      display: flex;
    }
    .el-slider{
      margin: 0rem 1rem;
    }
    .el-radio__label {
      color: #ffffff80;
    }
    .typeB{
      width: 80%;
      margin: auto;
    }
    .typeC{
      width: 70%;
      margin: auto;
    }
</style>