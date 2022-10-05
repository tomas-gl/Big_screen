<template>
  <div>
    <SideNavBar />
    <el-row>
      <el-col :span="24">
        <h1>Survey Admin</h1>
      </el-col>
    </el-row>
  </div>

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';

export default {
    components: { SideNavBar }
}
</script>

<style>
.el-row{
  margin-left: 200px;
}
  @media (max-width: 768px){
  .el-row{
    margin-left: 0px;
  }
}
</style>