import counties from './components/counties.vue';
import districts from './components/districts.vue';
import postalcode from './components/postalcode.vue';

let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        // districts_selected: '',
        districts_array: []
    },
    components:{
        'counties_select': counties,
        'districts_select': districts,
        'postalcode': postalcode
    },
    methods: {
        UpdateDistricts(counties_selected) {
            console.log(counties_selected);
            // this.districts_array = districts[counties_selected];
        }
        // ShowPostalCode(data){
        //     let counties_array = data[0];
        //     let counties_selected = data[1];
        //     let counties = counties_array[counties_selected];
        //     let districts = this.districts_array[this.districts_selected];
        // }
    }
})