<template>
    <div>
        <el-menu :router="true" class="el-menu-vertical-demo hidden-xs-only" mode="vertical" text-color="#fff" role="menubar" aria-labelledby="Menu">
            <div class="logo" role="menuitem"><img :src="logo"></div>
            <el-menu-item index="home" role="menuitem" aria-labelledby="Accueil" ><el-icon><PieChart /></el-icon>Accueil</el-menu-item>
            <el-menu-item index="survey" role="menuitem" aria-labelledby="Sondage"><el-icon><Document /></el-icon>Sondage</el-menu-item>
            <el-menu-item index="answers" role="menuitem" aria-labelledby="Réponses"><el-icon><List /></el-icon>Réponses</el-menu-item>
            <el-menu-item index="/administration" @click="logout" role="menuitem" aria-labelledby="Déconnexion"><el-icon><DArrowLeft /></el-icon>Déconnexion</el-menu-item>
        </el-menu>
        <el-menu :router="true" class="el-menu-horizontal-demo" mode="horizontal" text-color="#fff" background-color="#11101d" role="menubar" aria-labelledby="Menu">
            <el-sub-menu index="administration" role="menuitem" aria-labelledby="Submenu">
                <template #title >Bigscreen</template>
                <el-menu-item index="home" role="menuitem" aria-labelledby="Accueil"><el-icon><PieChart /></el-icon>Accueil</el-menu-item>
                <el-menu-item index="survey" role="menuitem" aria-labelledby="Sondage"><el-icon><Document /></el-icon>Sondage</el-menu-item>
                <el-menu-item index="answers" role="menuitem" aria-labelledby="Réponses"><el-icon><List /></el-icon>Réponses</el-menu-item>
                <el-menu-item index="/administration" @click="logout" role="menuitem" aria-labelledby="Déconnexion"><el-icon><DArrowLeft /></el-icon>Déconnexion</el-menu-item>
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
    },
     methods:{
        
      // Logout un utilisateur
      async logout(){
         localStorage.clear();
        },
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
        visibility: hidden;
        height: 0;
    }
}
.el-menu-vertical-demo {
    width: 200px;
    min-height: 400px;
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