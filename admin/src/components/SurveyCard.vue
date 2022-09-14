<template>
  <el-card class="box-card">
    <h2>Question {{ numQuestion }}/20</h2>
    <p>{{corpsQuestion}}</p>
  </el-card>
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
    .box-card {
    box-shadow: 0 15px 30px 1px grey;
	background: rgba(255, 255, 255, 0.90);
	border-radius: 5px;
    color: black;
	margin: 5em auto;
    }
</style>