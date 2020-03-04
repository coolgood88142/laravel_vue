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
        'name_textbox' : name,
        'address_select' : address,
        'birthday_select': birthday,
        'gender_radio': gender,
        'email_textbox': email,
        'interest_checkbox': interest,
        'usertable_table': usertable
    },
    methods: {
        send: function () {
            let nameError = this.$refs.name.nameError
            let birthdayError = this.$refs.birthday.birthdayError
            let addressError = this.$refs.address.addressError
            let genderError = this.$refs.gender.genderError
            let emailError = this.$refs.email.emailError
            let interestError = this.$refs.interest.interestError

            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
                document.getElementById("addForm").submit();
            }
            
        }
    }
})
