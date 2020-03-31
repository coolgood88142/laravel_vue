// import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// Vue.use(BootstrapVue);

import name from './components/name.vue';
import address from './components/address.vue';
import birthday from './components/birthday.vue';
import gender from './components/gender.vue';
import email from './components/email.vue';
import interest from './components/interest.vue';
import usertable from './components/usertable.vue'
import verification from './components/mixins/verification.js';



let app = new Vue({
    el: '#app',
    mixins: [verification],
    data: {
        title: '填寫個人資料',
        btnStyle: 'btn btn-primary',
        btnText: '送出'
    },
    components: {
        'name-textbox' : name,
        'address-select' : address,
        'birthday-select': birthday,
        'gender-radio': gender,
        'email-textbox': email,
        'interest-checkbox': interest,
        'usertable-table': usertable
    },
    methods: {
        send: function (sendName) {
            let nameError = this.$refs.name.getNameIsError()
            let birthdayError = this.$refs.birthday.getBirthdayIsError()
            let addressError = this.$refs.address.getAddressIsError()
            let genderError = this.$refs.gender.getGenderIsError()
            let emailError = this.$refs.email.getEmailIsError()
            let interestError = this.$refs.interest.getInterestIsError()

            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
                let params = new URLSearchParams()
                params.append('us_name', this.$refs.name.getNameValue())
                params.append('us_birthday', this.$refs.birthday.getBirthdayValue())
                params.append('us_counties', this.$refs.address.getCountiesValue())
                params.append('us_districts', this.$refs.address.getCountiesValue())
                params.append('us_road', this.$refs.address.getRoadValue())
                params.append('us_gender', this.$refs.gender.getGenderValue())
                params.append('us_email', this.$refs.email.getEmailValue())
                params.append('us_interest', this.$refs.interest.getInterestValue())
                
                axios.post(sendName, params).then(function (response) {
                    if (response.data == 'success'){
                        window.location = 'http://127.0.0.1:8000/user'
                    }
                    console.log(response)
                }).catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                     } else {
                        console.log('Error', error.message);
                    }
                 })
            }
        }
    }
})
