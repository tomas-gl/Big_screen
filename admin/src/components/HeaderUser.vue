<template>
    <div class="logo" on-scroll="handleScroll">
        <img :src="logo" width="417" heigth="60" alt="header_img">
    </div>
</template>

<script>
export default {
    data() {
    return {
      logo: require("../assets/logo_bigscreen.png")
    }
  },
  methods:{
  },
  mounted(){
  }
}
</script>

<style scoped>
    .logo {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 1rem 0;
        margin: 0rem 0rem 2rem 0rem;
        background: rgb(12, 12, 84);
    }
    @media (max-width: 768px){
        .logo > img{
            width: 213px;
            height: 30px;
        }
    }
    /* .logo > img{
        width: 30%;
    } */
</style>