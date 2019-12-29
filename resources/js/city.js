import counties from './components/counties.vue';
import districts from './components/districts.vue';

Vue.config.productionTip = false;
let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:'
    },
    components:{
        'counties_select': counties,
        'districts_select': districts
    }
})