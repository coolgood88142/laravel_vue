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
        nameTextBoxClass: classdata.methods.getTextBoxClass().success,
        nameTextClass: classdata.methods.getTextClass().success,
        yearError: false,
        monthError: false,
        dayError: false,
        countiesError: false,
        districtsError: false,
        genderError: false,
        emailError: false,
        interestError: false,
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
        getYearsSelected(isError){
            this.yearError = isError;
        },
        getMonthsSelected(isError) {
            this.monthError = isError;
        },
        getDaysSelected(isError) {
            this.dayError = isError;
        },
        getCountiesSelected(isError) {
            this.countiesError = isError;
        },
        getDistrictsSelected(isError) {
            this.districtsError = isError;
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
            this.nameTextBoxClass = this.nameError ? this.getTextBoxClass().error : this.getTextBoxClass().success
            this.nameTextClass = this.nameError ? this.getTextClass().error : this.getTextClass().success
            console.log(this.name_error)
            
            if (this.nameError != '' && year_val != '' && month_val != '' && day_val != '' && counties_val != '' && gender0.checked == true && gender1.checked == true
                && districts_val != '' && (interest0.checked == true || interest1.checked == true || interest2.checked == true)){
                    alert('送出成功!')
            }
            
        }
    }
})
