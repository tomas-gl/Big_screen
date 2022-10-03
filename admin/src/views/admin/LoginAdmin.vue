<template>
  <div>
    <HeaderUser />
    <el-row>
      <el-col :span="12" :offset="6">
        <el-form label-position="top">
          <el-form-item label="Email">
            <el-input type="email" v-model="email"/>
          </el-form-item>
          <el-form-item label="Mot de passe">
            <el-input type="password" v-model="password"/>
          </el-form-item>
        </el-form>

        <span v-if="errors.length">
          <span v-for="(error, index) in errors" :key="index">
            <el-alert v-bind:title=error type="error" show-icon class="errorMessage"/>
          </span>
        </span>

        <el-button type="primary" @click="login" size="large">S'identifier</el-button>

      </el-col>
    </el-row>
  </div>
</template>

<script>
import HeaderUser from '@/components/HeaderUser.vue';
import axios from 'axios';

export default {
    components: { HeaderUser },
    data(){
      return {
          email: '',
          password: '',
          errors: [],
      }
    },
    methods:{
          
      // Login a user
      async login(){
          this.errors = [];
          let formData = new FormData();
          formData.append('email', this.email);
          formData.append('password', this.password);
          let url = 'http://127.0.0.1:8000/api/login';
          await axios.post(url, formData).then(response =>{
              // this.$router.push('administration/home')
              // localStorage.setItem('loggedUser', response.data);
              console.log(response.data.token);
          }).catch(error =>{
              this.errors.push(error.response.data.message);
              console.log(error.response);
          });
        },
      },
}
</script>

<style>

</style>