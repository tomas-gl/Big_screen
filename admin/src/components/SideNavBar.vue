<template>
    <div>
        <!-- <el-row>
            <el-col :span="3"> -->
                <!-- <h5>Side Bar</h5> -->
                <!--default-active needs to be set to the vue-router object,
                meaning the default selected item would be the current page
                :default-active="$route.path"-->
                <el-menu :router="true" 
                class="el-menu-vertical-demo hidden-xs-only">
                    <el-menu-item index="home">Home Page</el-menu-item>
                    <el-menu-item index="survey">Survey Page</el-menu-item>
                    <el-menu-item index="answers">Answers Page</el-menu-item>
                </el-menu>
            <!-- </el-col>
        </el-row> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            // isCollapse: true,
        }
    }
}
</script>

<style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 400px;
}
.el-menu {
      position: fixed !important;
      left: 0;
      top: 0;
      height: 100%;
      transition: all 0.5s ease;
}
</style>