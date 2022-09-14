<template>
  <div>
    <div class="container">
        <h2>Question {{ num_question }}/20</h2>
        <p>{{question}}</p>
        <div v-if="type_question === 'B'">
            <input type="text" v-model="answers"/>
        </div>
        <!-- Need method for converting string to array first-->
        <!--:disabled for selecting only one answer ?-->
        <div v-if="type_question === 'A'">
            <div v-for="answer in possible_answers" :key="answer">
                <input type="checkbox" value="{{answer}}" v-model="answers"/>
            </div>
        </div>
        <div v-if="type_question === 'C'">
            <input type="text" v-model="answers"/>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['num_question', 'question', 'type_question', 'possible_answers'],
    data() {
        return {
            answers: []
        }
    },
    mounted() {
        //console.log(this.type_question)
    }
}
</script>

<style>
    h2 {
    text-align: left;
    margin-left: 1%;
    }
    .container {
    box-shadow: 0 15px 30px 1px grey;
	background: rgba(255, 255, 255, 0.90);
	border-radius: 5px;
	overflow: hidden;
    color: black;
	margin: 5em auto;
	height: 10em;
	width: 80%;
    }
</style>