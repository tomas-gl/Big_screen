<template>
    <div>
        <img :src="logo" class="logo">
    </div>
</template>

<script>
export default {
    data() {
    return {
      logo: require("../assets/logo_bigscreen.png")
    }
  }
}
</script>

<style>
    img.logo {
        position: sticky;
        width: 30%;
        margin: auto;
        margin-top: 1%;
    }
</style>