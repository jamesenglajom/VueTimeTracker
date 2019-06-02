<template>
  <div class="time-tracker">
    <div class="stop-watch">
      <StopWatch />
    </div>
  </div>
</template>

<script>
import StopWatch from './StopWatch';
export default {
  name: "TimeTracker",
  components: {
    StopWatch
  }
};
</script>

<style scoped>
</style>
