// import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// Vue.use(BootstrapVue);

import name from './components/name.vue';
import address from './components/address.vue';
import birthday from './components/birthday.vue';
import gender from './components/gender.vue';
import email from './components/email.vue';
import interest from './components/interest.vue';

let app = new Vue({
    el: '#app',
    data: {
        btnStyle: '"btn btn-primary'
    },
    components: {
        'name_textbox' : name,
        'address_select' : address,
        'birthday_select': birthday,
        'gender_radio': gender,
        'email_textbox': email,
        'interest_checkbox': interest
    },
    methods: {
        send: function () {
            let year = document.getElementById("year");
            let month = document.getElementById("month");
            let day = document.getElementById("day");
            let counties = document.getElementById("counties");
            let districts = document.getElementById("districts");
            let interest0 = document.getElementById("interest0");
            let interest1 = document.getElementById("interest1");
            let interest2 = document.getElementById("interest2");

            let year_val = year.options[year.selectedIndex].value;
            let month_val = month.options[month.selectedIndex].value;
            let day_val = day.options[day.selectedIndex].value;
            let counties_val = counties.options[counties.selectedIndex].value;
            let districts_val = districts.options[districts.selectedIndex].value;
            let interest0_val = interest0.options[interest0.selectedIndex].value;
            let interest1_val = interest1.options[interest1.selectedIndex].value;
            let interest2_val = interest2.options[interest2.selectedIndex].value;
            
            if (year_val != '' && month_val != '' && day_val != '' && counties_val != ''
                && districts_val != ''){
                    alert('送出成功!')
            }
            
        }
    }
})
