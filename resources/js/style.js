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
        nameError : false
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
            let us_year = document.getElementById("us_year");
            let us_month = document.getElementById("us_month");
            let us_day = document.getElementById("us_day");
            this.nameError = true;
        }
    }
})
