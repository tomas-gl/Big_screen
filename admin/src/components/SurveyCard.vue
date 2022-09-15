<template>
    <div class="question-card">
        <el-card class="box-card">
            <template #header class="question-info">
                <h2>Question {{ num_question }}/20</h2>
                <p>{{corps_question}}</p>
                <p>{{user_answer}}</p>
            </template>
            <div class="options">
                <div v-if="type_question == 'A'" class="typeA">
                    <div v-for="possible_answer in possible_answers" :key="possible_answer">
                        <label>{{possible_answer}}</label>
                        <el-input type="radio" 
                        :value="possible_answer" 
                        v-model="user_answer"
                        class="option"/>
                    </div>
                </div>
                <div v-if="type_question == 'B'" class="typeB">
                    <el-input type="text"
                    maxlength="255"
                    placeholder="Ecrivez votre réponse ici"
                    v-model="user_answer"
                    class="option"/>
                </div>
                <div v-if="type_question == 'C'" class="typeC">
                    <el-slider v-model="user_answer" 
                    :step="1" 
                    :min="1"
                    :max="5"
                    class="option"/>
                </div>
            </div>
        </el-card>
        
        
        
        
        
        <!--<el-card class="box-card">
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
    <div v-else-if="type_question == 'B'">
      <el-input
        @change="getAnswer(num_question)"
        v-model="answer"
        type="email"
        placeholder="Please email"
      />
    </div>
  </el-card>-->
    </div>
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
        user_answer: [],
      }
    },
    methods:{
      getAnswer(value){
        this.$emit('answerToAnswers', {'questionId' : value, 'answer' : this.answer})
      },
      answerCleaning(possible_answers) {
        let cleaned_answers = possible_answers.split(",")
        .map(answer => {
            answer = answer.trim()
            answer = answer.charAt(0).toUpperCase() +answer.slice(1)
            return answer
        })
        this.possible_answers = cleaned_answers
      }
    }, 
    mounted() {
        this.answerCleaning(this.possible_answers)
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
    .typeA.option {
        padding: 1rem;
        display: block;
        background-color: #271c36;
        margin-bottom: 0.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
    }
</style>