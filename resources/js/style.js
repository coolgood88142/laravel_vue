// import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// Vue.use(BootstrapVue);

import name from './components/name.vue';
import birthday from './components/birthday.vue';
import gender from './components/gender.vue';
import email from './components/email.vue';
import interest from './components/interest.vue';
import counties from './components/counties.vue';
import districts from './components/districts.vue';

let begin_year = 1900;
let end_year = 2020;

let begin_month = 1;
let end_month = 12;

function DefaultDateData(begin, end) {
    let date_array = [];
    for (let i = begin; i < end + 1; i++) {
        date_array.push({ value: i });
    }

    return date_array;
}

let app = new Vue({
    el: '#app',
    data: {
        years: DefaultDateData(begin_year, end_year),
        months: DefaultDateData(begin_month, end_month),
        days: '',
        years_selected: '',
        months_selected: '',
        days_selected: '',
        countiesSelected: NaN,
        districtsSelected: '',
        isError: false,
        errorColor: 'text-danger',
        textColor: 'text-black',
        btnStyle: '"btn btn-primary'
    },
    components: {
        'counties_select': counties,
        'districts_select': districts,
        'name_textbox' : name,
        'birthday_select': birthday,
        'gender_radio': gender,
        'email_textbox': email,
        'interest_checkbox': interest
    },
    methods: {
        clearOptions: function () {
            this.months_selected = '';
            this.days = '';
            this.days_selected = '';
        },
        onChange: function () {
            this.days_selected = '';
            let year = this.years[this.years_selected].value;
            let month = this.months[this.months_selected].value;
            this.days = new Date(year, month, 0).getDate()
        },
        getDistrictsSelected(DistrictsSelected) {
            this.districtsSelected = DistrictsSelected;
        },
        updateDistricts(CountiesSelected) {
            this.countiesSelected = CountiesSelected;
        }
    }
})
