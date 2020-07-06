import 'bootstrap/dist/css/bootstrap.css'
import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

var vm = new Vue({
    el: "#el",
    data: {
        title: 'vue-select',
        options: [{id: 'Canada', value: 'ca'}]
    }
});