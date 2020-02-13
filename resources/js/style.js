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
        title: '填寫個人資料',
        btnStyle: 'btn btn-primary',
        btnText: '送出',
        nameStyle:{
            Error: true,
            Warning: false
        },
        birthdayStyle:{
            Error: false,
            Incomplete: true
        },
        addressStyle:{
            Error: false,
            Incomplete: true
        },
        genderStyle:{
            Error: true,
            Warning: false
        },
        emailStyle:{
            Error: true,
            Warning: false,
            Format: false
        },
        interestStyle:{
            Error: true,
            Warning: false
        }
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
                this.nameStyle.Error = true
                this.nameStyle.Warning = true
            }else{
                this.nameStyle.Error = false
                this.nameStyle.Warning = false
            }

            let us_year = document.getElementById("us_year");
            let us_month = document.getElementById("us_month");
            let us_day = document.getElementById("us_day");
            let year_val = us_year.options[us_year.selectedIndex].value;
            let month_val = us_month.options[us_month.selectedIndex].value;
            let day_val = us_day.options[us_day.selectedIndex].value;
            
            if (year_val != '*' && month_val != '*' && day_val != '*'){
                this.birthdayStyle.Error = false
                this.birthdayStyle.Incomplete = true
            }else{
                this.birthdayStyle.Error = true
                if (year_val == '*' && month_val == '*' && day_val == '*'){
                    this.birthdayStyle.Incomplete = false
                }else{
                    this.birthdayStyle.Incomplete = true
                }
            }

            let counties = document.getElementById("counties");
            let districts = document.getElementById("districts");
            let us_address = document.getElementById("us_address");
            let counties_val = counties.options[counties.selectedIndex].value;
            let districts_val = districts.options[districts.selectedIndex].value;

            if (counties_val != '' && districts_val != '' && us_address.value != '') {
                this.addressStyle.Error = false
                this.addressStyle.Incomplete = true
            } else {
                this.addressStyle.Error = true
                if (counties_val == '' && districts_val == '' && us_address.value == '') {
                    this.addressStyle.Incomplete = false
                } else {
                    this.addressStyle.Incomplete = true
                }
            }

            let gender0 = document.getElementById("gender0");
            let gender1 = document.getElementById("gender1");

            if (gender0.checked != true && gender1.checked != true){
                this.genderStyle.Error = true
                this.genderStyle.Warning = true
            }else{
                this.genderStyle.Error = false
                this.genderStyle.Warning = false
            }

            let us_email = document.getElementById("us_email");
            let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;

            if (us_email.value == '') {
                this.emailStyle.Warning = true
            } else {
                if (!isMail.test(us_email.value)) {
                    this.emailStyle.Error = true
                    this.emailStyle.Format = true
                } else {
                    this.emailStyle.Error = false
                    this.emailStyle.Format = false
                    this.emailStyle.Warning = false
                }
            }

            let interest0 = document.getElementById("interest0");
            let interest1 = document.getElementById("interest1");
            let interest2 = document.getElementById("interest2");

            if (interest0.checked != true && interest1.checked != true && interest2.checked != true){
                this.interestStyle.Error = true
                this.interestStyle.Warning = true
            }else{
                this.interestStyle.Error = false
                this.interestStyle.Warning = false
            }
            
            if (year_val != '' && month_val != '' && day_val != '' && counties_val != ''
                && districts_val != '' && (interest0.checked == true || interest1.checked == true || interest2.checked == true)){
                    alert('送出成功!')
            }
            
        }
    }
})
