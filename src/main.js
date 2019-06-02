import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

Vue.filter('formatAMPM', (date) => {
  if (typeof date === 'number') {
    date = new Date(date)
  }

  let hours = date.getHours()
  let minutes = date.getMinutes()
  let ampm = hours >= 12 ? 'pm' : 'am'
  hours = hours % 12
  hours = hours || 12 // the hour '0' should be '12'
  minutes = minutes < 10 ? '0' + minutes : minutes
  return hours + ':' + minutes + ' ' + ampm
})

new Vue({
  render: h => h(App)
}).$mount('#app')
