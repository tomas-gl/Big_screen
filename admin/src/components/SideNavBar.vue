<template>
    <div>
        <el-row>
            <el-col :span="3">
                <h5>Side Bar</h5>
                <!--default-active needs to be set to the vue-router object,
                meaning the default selected item would be the current page
                :default-active="$route.path"-->
                <el-menu :router="true" 
                class="el-menu-vertical-demo">
                    <el-menu-item index="1">Home Page</el-menu-item>
                    <el-menu-item index="2">Survey Page</el-menu-item>
                    <el-menu-item index="3">Answers Page</el-menu-item>
                </el-menu>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isCollapse: true,
        }
    }
}
</script>

<style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 400px;
}
el-menu {
    display: inline-block;
}
</style>