<template>
    <div>
        <el-menu :router="true" class="el-menu-vertical-demo hidden-xs-only" mode="vertical" text-color="#fff">
            <div class="logo"><img :src="logo"></div>
            <el-menu-item index="home"><el-icon><HomeFilled /></el-icon>Accueil</el-menu-item>
            <el-menu-item index="survey"><el-icon><Document /></el-icon>Sondage</el-menu-item>
            <el-menu-item index="answers"><el-icon><List /></el-icon>Réponses</el-menu-item>
        </el-menu>
        <el-menu :router="true" class="el-menu-horizontal-demo" mode="horizontal" text-color="#fff" background-color="#11101d">
            <el-sub-menu index="administration">
                <template #title>Bigscreen</template>
                <el-menu-item index="home"><el-icon><HomeFilled /></el-icon>Accueil</el-menu-item>
                <el-menu-item index="survey"><el-icon><Document /></el-icon>Sondage</el-menu-item>
                <el-menu-item index="answers"><el-icon><List /></el-icon>Réponses</el-menu-item>
            </el-sub-menu>
        </el-menu>
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

<style scoped>
.logo{
    margin: 1rem;
}
.logo > img{
    width: 100%;
}
.el-menu-vertical-demo, .el-menu-horizontal-demo{
    background: #11101d;
}
@media only screen and (min-width: 768px) {
    .el-menu-horizontal-demo {
        display: none;
    }
}
.el-menu-vertical-demo {
  width: 200px;
  min-height: 400px;
}
.el-menu-vertical-demo {
    position: fixed !important;
    left: 0;
    top: 0;
    height: 100%;
    transition: all 0.5s ease;
}
.el-menu-item:hover, .el-menu--popup > .el-menu-item:hover{
    color: black !important;
}
.el-menu--popup > .el-menu-item{
    color: #ffffff !important;
    padding: 1rem !important;
    background-color: #11101d !important;
    font-family: Avenir, Helvetica, Arial, sans-serif;
}
.el-menu--popup > .el-menu-item:hover{
    background-color: #ffffff !important;
}
</style>