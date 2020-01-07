import counties from './components/counties.vue';
import districts from './components/districts.vue';
import postalcode from './components/postalcode.vue';

let districts_data = '', districts_selected = '', counties_selected = '';
let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        // districts_selected: '',
        districts_array: [],
        styleObject: {
            color: "black"
        }
    },
    components:{
        'counties_select': counties,
        'districts_select': districts,
        'postalcode': postalcode
    },
    methods: {
        GetDistrictsData(DistrictsData) {
            districts_data = DistrictsData;
        },
        GetDistrictsSelected(DistrictsSelected) {
            districts_selected = DistrictsSelected;
        },
        UpdateDistricts(CountiesSelected) {
            counties_selected = CountiesSelected;
            this.districts_array = districts_data[counties_selected];
        },
        ShowPostalCode(){
            let districts_text = '';
            for (var i = 0; i < this.districts_array.length; i++) {
                if (this.districts_array[i].value === districts_selected){
                    districts_text = this.districts_array[i].text;
                }
            }
            // let counties_array = data[0];
            // let counties_selected = data[1];
            // let counties = counties_array[counties_selected];
            // let districts = this.districts_array[this.districts_selected];
        }
    }
})