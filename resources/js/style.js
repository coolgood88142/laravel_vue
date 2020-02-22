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
        btnText: '送出',
        nameValue:'',
        nameInputClass: classdata.methods.getInputClass(),
        nameSmallClass: classdata.methods.getTextClass(),
        yearValue:'',
        monthValue: '',
        dayValue: '',
        birthdayIcomplete: false,
        birthdaySelectClass: classdata.methods.getSelectClass(),
        birthdaySmallClass: classdata.methods.getTextClass(),
        addressValue:'',
        countiesValue:'',
        districtsValue:'',
        addressIcomplete: false,
        addressSelectClass: classdata.methods.getSelectClass(),
        addressInputClass: classdata.methods.getInputClass(),
        addressSmallClass: classdata.methods.getTextClass(),
        genderValue:'',
        genderCheckLabelClass: classdata.methods.getCheckLabelClass(),
        genderSmallClass: classdata.methods.getTextClass(),
        emailValue: '',
        emailFormat:false,
        emailInputClass: classdata.methods.getInputClass(),
        emailSmallClass: classdata.methods.getTextClass(),
        interestValue:'',
        interestCheckLabelClass: classdata.methods.getCheckLabelClass(),
        interestSmallClass: classdata.methods.getTextClass(),
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
        updateNameValue: function(newVal){
            this.nameValue = newVal
        },
        updateBirthdayValue: function (newVal) {
            this.yearValue = newVal.years
            this.monthValue = newVal.months
            this.dayValue = newVal.days
        },
        updateAddressValue: function (newVal) {
            this.countiesValue = newVal.counties
            this.districtsValue = newVal.districts
            this.addressValue = newVal.address
        },
        updateGenderValue: function(newVal) {
            this.genderValue = newVal
        },
        updateEmailValue: function (newVal) {
            this.emailValue = newVal
        },
        updateInterestValue: function (newVal) {
            this.interestValue = newVal
        },
        send: function () {
            //使用全部的component的function要回傳布林值，在function做完資料判斷後，宣告變數為布林值，就可以在component直接變更class
            //回傳的布林值做是否要顯示"送出成功!"文字
            let nameError = name.methods.getNameIsError(this.nameValue)
            this.nameInputClass = classdata.methods.setElementClass(nameError, "input", false)
            this.nameSmallClass = classdata.methods.setElementClass(nameError, "text", false)

            let birthdayErrorData = birthday.methods.getBirthdayIsError(this.yearValue, this.monthValue, this.dayValue)
            let birthdayError = birthdayErrorData.isError
            this.birthdayIcomplete = birthdayErrorData.isRemind
            this.birthdaySelectClass = classdata.methods.setElementClass(birthdayError, "select", this.birthdayIcomplete)
            this.birthdaySmallClass = classdata.methods.setElementClass(birthdayError, "text", this.birthdayIcomplete)

            let addressErrorData = address.methods.getAddressIsError(this.countiesValue, this.districtsValue, this.addressValue)
            let addressError = addressErrorData.isError
            this.addressIcomplete = addressErrorData.isRemind
            this.addressSelectClass = classdata.methods.setElementClass(addressError, "select", this.addressIcomplete)
            this.addressInputClass = classdata.methods.setElementClass(addressError, "input", this.addressIcomplete)
            this.addressSmallClass = classdata.methods.setElementClass(addressError, "text", this.addressIcomplete)

            let genderError = gender.methods.getGenderIsError(this.genderValue)
            this.genderCheckLabelClass = classdata.methods.setElementClass(genderError, "checklabel", false)
            this.genderSmallClass = classdata.methods.setElementClass(genderError, "text", false)

            let emailErrorData = email.methods.getEmailIsError(this.emailValue)
            let emailError = emailErrorData.isError
            this.emailFormat = emailErrorData.isFormat
            this.emailInputClass = classdata.methods.setElementClass(emailError, "input", false)
            this.emailSmallClass = classdata.methods.setElementClass(emailError, "text", this.emailFormat)

            let interestError = interest.methods.getInterestIsError(this.interestValue)
            this.interestCheckLabelClass = classdata.methods.setElementClass(interestError, "checklabel", false)
            this.interestSmallClass = classdata.methods.setElementClass(interestError, "text", false)

            
            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
            }
            
        }
    }
})
