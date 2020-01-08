import counties from './components/counties.vue';
import districts from './components/districts.vue';
import postalcode from './components/postalcode.vue';

let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        countiesSelected: NaN,
        districtsSelected: ''
    },
    components:{
        'counties_select': counties,
        'districts_select': districts,
        'postalcode': postalcode
    },
    methods: {
        getDistrictsSelected(DistrictsSelected) {
            this.districtsSelected = DistrictsSelected;
        },
        updateDistricts(CountiesSelected) {
            this.countiesSelected = CountiesSelected;
        },
        showPostalCode(){
            let counties = document.getElementById("counties");
            let districts = document.getElementById("districts");
            let counties_text = counties.options[counties.selectedIndex].text;
            let districts_text = districts.options[districts.selectedIndex].text;

            let show_text = counties_text + " " + districts_text + " 郵遞區號為：" + this.districtsSelected;
            alert(show_text);
        }
    }
})