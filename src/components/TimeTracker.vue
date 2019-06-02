<template>
  <div class="time-tracker">
      <StopWatch @stop="logs.push($event)" />
      <Logs :logs="logs" />
  </div>
</template>

<script>
import StopWatch from './StopWatch'
import Logs from './Logs'

export default {
  name: 'TimeTracker',
  components: {
    StopWatch,
    Logs
  },
  data () {
    return {
      logs: []
    }
  }
}
</script>

<style scoped>
</style>
