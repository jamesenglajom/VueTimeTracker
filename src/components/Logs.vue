<template>
    <ul class="logs">
      <li
        v-for="log in logs"
        :key="log.startTime"
      >{{ log.startTime | formatAMPM }} - {{ log.endTime | formatAMPM }}</li>
    </ul>
</template>

<script>
export default {
  name: 'Logs',
  props: {
    logs: {
      type: Array,
      default: () => [],
      required: true
    }
  }
}
</script>

<style>

</style>
