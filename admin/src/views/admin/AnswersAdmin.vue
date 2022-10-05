<template>
  <div>
    <SideNavBar />
    <el-row>
      <el-col :span="24">
        <div class="test">
          <h1>Answers Admin</h1>
        </div>
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
.test{
  margin-left: 200px !important;
}
</style>