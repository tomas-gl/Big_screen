<template>
  <div>
    <HeaderUser />
    <el-row justify="center">
      <el-col :xs="18" :sm="12" :lg="8">
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

        <el-button @click="login" size="large">S'identifier <el-icon><ArrowRight /></el-icon></el-button>

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

      // identifie un utilisateur
      async login(){
          this.errors = [];
          let formData = new FormData();
          formData.append('email', this.email);
          formData.append('password', this.password);
          let url = 'http://127.0.0.1:8000/api/login';
          await axios.post(url, formData).then(response =>{
              this.$store.commit('addAdmin', response.data.auth_user);
              this.$router.push('/administration/home');
          }).catch(error =>{
              this.errors.push(error.response.data.message);
              console.log(error.response);
          });
        },
    }
}
</script>

<style scoped>
.el-col{
    box-shadow: 0 15px 30px 1px #8080805e !important;
    background-color: rgba(35 38 47 / 70%) !important;
    border-radius: 5px;
    margin: 1.5em auto;
    padding: 2rem 3rem;
}
.el-form{
  margin-bottom: 2rem;
}

</style>