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
import classdata from './components/mixins/class.js';

let app = new Vue({
    el: '#app',
    mixins: [classdata],
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
        'interest_checkbox': interest
    },
    methods: {
        send: function () {
            //使用全部的component的function要回傳布林值，在function做完資料判斷後，宣告變數為布林值，就可以在component直接變更class
            //回傳的布林值做是否要顯示"送出成功!"文字
            let nameError = name.methods.getNameIsError()
            console.log(classdata.data.text.hide)
            this.showNameErrorClass = (this.name_value == '') ? true : false
            this.showYearErrorClass = (this.birthdayError.year_selected == '*') ? true : false
            this.showMonthErrorClass = (this.birthdayError.month_selected == '*') ? true : false
            this.showDayErrorClass = (this.birthdayError.day_selected == '*') ? true : false
            this.showBirthdayErrorText = (this.showYearErrorClass || this.showMonthErrorClass || this.showDayErrorClass)
            // this.showCountiesErrorClass = this.countiesError
            // this.showDistrictsErrorClass = this.districtsError
            // this.showAddressErrorClass = this.addressError
            // this.showGenderErrorClass = this.genderError
            // this.showEmailErrorClass = this.emailError
            // this.showInterestErrorClass = this.interestError
            
            // if (this.nameError != '' && year_val != '' && month_val != '' && day_val != '' && counties_val != '' && gender0.checked == true && gender1.checked == true
            //     && districts_val != '' && (interest0.checked == true || interest1.checked == true || interest2.checked == true)){
            //         alert('送出成功!')
            // }
            
        }
    }
})
