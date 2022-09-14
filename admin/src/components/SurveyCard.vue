<template>
  <div>
    <div class="container">
        <h2>Question {{ numQuestion }}/20</h2>
        <p>{{corpsQuestion}}</p>
    </div>
  </div>
</template>

<script>
export default {
    props: ['numQuestion', 'corpsQuestion']
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