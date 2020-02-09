import 'bootstrap/dist/css/bootstrap.css'
import counties from './components/counties.vue';
import districts from './components/districts.vue';
import postalcode from './components/postalcode.vue';

let app = new Vue({
    el: '#app',
    data:{
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        countiesSelected: NaN,
        districtsSelected: '',
        countiesError: false,
        districtsError: false,
        errorColor: 'text-danger',
        textColor: 'text-black',
        btnStyle: 'btn btn-primary',
        textStyle: 'text-black font-weight-bold'
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
            
            let counties_val = counties.options[counties.selectedIndex].value;
            let districts_val = districts.options[districts.selectedIndex].value;
            let show_text = '';

            if (counties_val == ''){
                this.countiesError = true;
            }else{
                this.countiesError = false;
            }

            if (districts_val == '') {
                this.districtsError = true;
            } else {
                this.districtsError = false;
            }

            if (counties_val != '' && districts_val != '') {
                let counties_text = counties.options[counties.selectedIndex].text;
                let districts_text = districts.options[districts.selectedIndex].text;
                let num = this.districtsSelected;

                show_text = counties_text + " " + districts_text + " 郵遞區號為：" + num;
                alert(show_text);
            }
        }
    }
})