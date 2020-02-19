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
import classdata from './class.js';


let app = new Vue({
    el: '#app',
    mixins: [classdata],
    data: {
        title: '填寫個人資料',
        btnStyle: 'btn btn-primary',
        btnText: '送出',
        nameError: false,
        showNameErrorClass: false,
        yearError: false,
        monthError: false,
        dayError: false,
        birthdayError:{
            [yearError, monthError, dayError]
        },
        showYearErrorClass: false,
        showMonthErrorClass: false,
        showDayErrorClass: false,
        showBirthdayErrorClass:{
            [showYearErrorClass, showMonthErrorClass, showDayErrorClass]
        }
        countiesError: false,
        showCountiesErrorClass: false,
        districtsError: false,
        showDistrictsErrorClass: false,
        addressError: false,
        showAddressErrorClass: false,
        genderError: false,
        showGenderErrorClass: false,
        emailError: false,
        showEmailErrorClass: false,
        interestError: false,
        showInterestErrorClass: false,
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
        getNameIsError(isError) {
            this.nameError = isError;
        },
        getBirthdaySelected(Selected){
            for(let i = 0; i<Selected.length; i++){
                Selected[i]
            }
            this.yearError = isError;
        }
        getCountiesSelected(isError) {
            this.countiesError = isError;
        },
        getDistrictsSelected(isError) {
            this.districtsError = isError;
        },
        getAddressIsError(isError) {
            this.addressError = isError;
        },
        getGenderChecked(isError) {
            this.genderError = isError;
        },
        getEmailIsError(isError) {
            this.emailError = isError;
        },
        getInterestChecked(isError){
            this.interestError = isError
        },
        send: function () {
            //TODO:全部的component要回傳boolean 要在這裡做判斷，要顯示送出成功文字
            //各個component判斷完v-model資料後，在用mixins使用class.js裡的變數(用function return想要的class回傳)
            //做完後再帶boolean到這裡
            this.showNameErrorClass = this.nameError
            this.showYearErrorClass = this.yearError
            this.showMonthErrorClass = this.monthError
            this.showDayErrorClass = this.dayError
            this.showCountiesErrorClass = this.countiesError
            this.showDistrictsErrorClass = this.districtsError
            this.showAddressErrorClass = this.addressError
            this.showGenderErrorClass = this.genderError
            this.showEmailErrorClass = this.emailError
            this.showInterestErrorClass = this.interestError
            
            if (this.nameError != '' && year_val != '' && month_val != '' && day_val != '' && counties_val != '' && gender0.checked == true && gender1.checked == true
                && districts_val != '' && (interest0.checked == true || interest1.checked == true || interest2.checked == true)){
                    alert('送出成功!')
            }
            
        }
    }
})
