<template>
  <div class="stop-watch">
    <h1>
      <time>{{ timerDisplay }}</time>
    </h1>
    <button @click="toggleTimer">{{ btnText }}</button>
  </div>
</template>

<script>
export default {
  name: 'StopWatch',
  data () {
    return {
      startTime: null,
      updatedTime: null,
      difference: null,
      tInterval: null,
      savedTime: null,
      isPause: true
    }
  },
  computed: {
    btnText () {
      return this.isPause ? 'Start' : 'Stop'
    },
    timerDisplay () {
      let hours = Math.floor(
        (this.difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      )
      let minutes = Math.floor(
        (this.difference % (1000 * 60 * 60)) / (1000 * 60)
      )
      let seconds = Math.floor((this.difference % (1000 * 60)) / 1000)
      // let milliseconds = Math.floor((this.difference % (1000 * 60)) / 100);
      hours = hours < 10 ? '0' + hours : hours
      minutes = minutes < 10 ? '0' + minutes : minutes
      seconds = seconds < 10 ? '0' + seconds : seconds
      // milliseconds =
      //   milliseconds < 100
      //     ? milliseconds < 10
      //       ? "00" + milliseconds
      //       : "0" + milliseconds
      //     : milliseconds;
      return hours + ':' + minutes + ':' + seconds
    }
  },
  methods: {
    toggleTimer () {
      if (this.isPause) {
        if (this.tInterval) {
          this.resetTimer()
        }

        this.startTime = new Date().getTime()
        this.tInterval = setInterval(this.calcTime, 1)
        // change 1 to 1000 above to run script every second instead of every millisecond.

        this.isPause = false
      } else {
        this.pauseTimer()
        this.$emit('stop', {
          startTime: this.startTime,
          endTime: this.updatedTime,
          difference: this.difference
        })
      }
    },
    pauseTimer () {
      if (!this.difference) {
        // if timer never started, don't allow pause button to do anything
        return
      }

      if (!this.isPause) {
        clearInterval(this.tInterval)
        this.savedTime = this.difference
        this.isPause = true
      } else {
        // if the timer was already paused, when they click pause again, start the timer again
        this.startTimer()
      }
    },
    resetTimer () {
      clearInterval(this.tInterval)
      this.savedTime = 0
      this.difference = 0
      this.isPause = true
    },
    calcTime () {
      this.updatedTime = new Date().getTime()
      if (this.savedTime) {
        this.difference = this.updatedTime - this.startTime + this.savedTime
      } else {
        this.difference = this.updatedTime - this.startTime
      }
    }
  }
}
</script>

<style scoped>
</style>
