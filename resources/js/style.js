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
        nameEl:{
            nameValue:'',
            nameInputClass: classdata.methods.getInputClass(),
            nameSmallClass: this.getTextClass()
        },
        birthdayEl:{
            yearValue:'',
            monthValue: '',
            dayValue: '',
            birthdayIcomplete: false,
            birthdaySelectClass: classdata.methods.getSelectClass(),
            birthdaySmallClass: classdata.methods.getTextClass()
        },
        addressEl:{
            addressValue:'',
            countiesValue:'',
            districtsValue:'',
            addressIcomplete: false,
            addressSelectClass: classdata.methods.getSelectClass(),
            addressInputClass: classdata.methods.getInputClass(),
            addressSmallClass: classdata.methods.getTextClass()
        },
        genderEl:{
            genderValue:'',
            genderCheckLabelClass: classdata.methods.getCheckLabelClass(),
            genderSmallClass: classdata.methods.getTextClass()
        },
        emailEl:{
            emailValue: '',
            emailFormat:false,
            emailInputClass: classdata.methods.getInputClass(),
            emailSmallClass: classdata.methods.getTextClass()
        },
        interestEl:{
            interestValue:'',
            interestCheckLabelClass: classdata.methods.getCheckLabelClass(),
            interestSmallClass: classdata.methods.getTextClass()
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
        updateNameValue: function(newVal){
            this.nameEl.nameValue = newVal
        },
        updateBirthdayValue: function (newVal) {
            this.birthdayEl.yearValue = newVal.years
            this.birthdayEl.monthValue = newVal.months
            this.birthdayEl.dayValue = newVal.days
        },
        updateAddressValue: function (newVal) {
            this.addressEl.countiesValue = newVal.counties
            this.addressEl.districtsValue = newVal.districts
            this.addressEl.addressValue = newVal.address
        },
        updateGenderValue: function(newVal) {
            this.genderEl.genderValue = newVal
        },
        updateEmailValue: function (newVal) {
            this.emailEl.emailValue = newVal
        },
        updateInterestValue: function (newVal) {
            this.interestEl.interestValue = newVal
        },
        send: function () {
            //使用全部的component的function要回傳布林值，在function做完資料判斷後，宣告變數為布林值，就可以在component直接變更class
            //回傳的布林值做是否要顯示"送出成功!"文字
            
            let nameError = name.methods.getNameIsError(this.nameEl.nameValue)
            this.nameEl.nameInputClass = classdata.methods.setElementClass(nameError, "input", false)
            this.nameEl.nameSmallClass = classdata.methods.setElementClass(nameError, "text", false)

            let birthdayErrorData = birthday.methods.getBirthdayIsError(this.birthdayEl.yearValue, this.birthdayEl.monthValue, this.birthdayEl.dayValue)
            let birthdayError = birthdayErrorData.isError
            this.birthdayEl.birthdayIcomplete = birthdayErrorData.isRemind
            this.birthdayEl.birthdaySelectClass = classdata.methods.setElementClass(birthdayError, "select", this.birthdayEl.birthdayIcomplete)
            this.birthdayEl.birthdaySmallClass = classdata.methods.setElementClass(birthdayError, "text", this.birthdayEl.birthdayIcomplete)

            let addressErrorData = address.methods.getAddressIsError(this.addressEl.countiesValue, this.addressEl.districtsValue, this.addressEl.addressValue)
            let addressError = addressErrorData.isError
            this.addressEl.addressIcomplete = addressErrorData.isRemind
            this.addressEl.addressSelectClass = classdata.methods.setElementClass(addressError, "select", this.addressEl.addressIcomplete)
            this.addressEl.addressInputClass = classdata.methods.setElementClass(addressError, "input", this.addressEl.addressIcomplete)
            this.addressEl.addressSmallClass = classdata.methods.setElementClass(addressError, "text", this.addressEl.addressIcomplete)

            let genderError = gender.methods.getGenderIsError(this.genderEl.genderValue)
            this.genderEl.genderCheckLabelClass = classdata.methods.setElementClass(genderError, "checklabel", false)
            this.genderEl.genderSmallClass = classdata.methods.setElementClass(genderError, "text", false)

            let emailErrorData = email.methods.getEmailIsError(this.emailEl.emailValue)
            let emailError = emailErrorData.isError
            this.emailEl.emailFormat = emailErrorData.isFormat
            this.emailEl.emailInputClass = classdata.methods.setElementClass(emailError, "input", false)
            this.emailEl.emailSmallClass = classdata.methods.setElementClass(emailError, "text", this.emailEl.emailFormat)

            let interestError = interest.methods.getInterestIsError(this.interestEl.interestValue)
            this.interestEl.interestCheckLabelClass = classdata.methods.setElementClass(interestError, "checklabel", false)
            this.interestEl.interestSmallClass = classdata.methods.setElementClass(interestError, "text", false)

            
            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
            }
            
        }
    }
})
