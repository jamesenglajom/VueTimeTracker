<template>
  <div id="app">
    <TimeTracker />
  </div>
</template>

<script>
import TimeTracker from './components/TimeTracker.vue'

export default {
  name: 'app',
  components: {
    TimeTracker
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
