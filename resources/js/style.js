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
        btnStyle: '"btn btn-primary',
        nameError: false,
        birthdayError: false,
        addressError: false,
        emailError: false,
        interestError: false
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
            let us_name = document.getElementById("us_name");
            if (us_name.value == ''){
                this.nameError = true
            }else{
                this.nameError = false
            }

            let us_year = document.getElementById("us_year");
            let us_month = document.getElementById("us_month");
            let us_day = document.getElementById("us_day");
            let year_val = us_year.options[us_year.selectedIndex].value;
            let month_val = us_month.options[us_month.selectedIndex].value;
            let day_val = us_day.options[us_day.selectedIndex].value;

            if (year_val == '*' || month_val == '*' || day_val == '*'){
                this.birthdayError = true
            }else{
                this.birthdayError = false
            }

            let counties = document.getElementById("counties");
            let districts = document.getElementById("districts");
            let us_address = document.getElementById("us_address");
            let counties_val = counties.options[counties.selectedIndex].value;
            let districts_val = districts.options[districts.selectedIndex].value;

            if (counties_val == '' || districts_val == '' || us_address.value == ''){
                this.addressError = true
            }else{
                this.addressError = false
            }

            let us_email = document.getElementById("us_email");
            let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (!isMail.test(us_email.value)) {
                this.emailError = true
            } else {
                this.emailError = false
            }

            let interest0 = document.getElementById("interest0");
            let interest1 = document.getElementById("interest1");
            let interest2 = document.getElementById("interest2");

            if (interest0.checked != true && interest1.checked != true && interest2.checked != true){
                this.interestError = true
            }else{
                this.interestError = false
            }
            
            if (year_val != '' && month_val != '' && day_val != '' && counties_val != ''
                && districts_val != '' && (interest0.checked == true || interest1.checked == true || interest2.checked == true)){
                    alert('送出成功!')
            }
            
        }
    }
})
