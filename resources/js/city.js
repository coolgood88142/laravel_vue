import counties from './components/counties.vue';
import districts from './components/districts.vue';
import postalcode from './components/postalcode.vue';

Vue.config.productionTip = false;
let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:',
        showText: '顯示郵遞區號!'
    },
    components:{
        'counties_select': counties,
        'districts_select': districts,
        'postalcode': postalcode
    }
})