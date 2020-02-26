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
import verification from './components/mixins/verification.js';



let app = new Vue({
    el: '#app',
    mixins: [verification],
    data: {
        title: '填寫個人資料',
        btnStyle: 'btn btn-primary',
        btnText: '送出',
        name:{
            inputClass:'',
            smallClass: '',
        },
        birthday:{
            icomplete: false,
            yearSelectClass: '',
            monthSelectClass: '',
            daySelectClass: '',
            smallClass: ''
        },
        address:{
            icomplete: false,
            countiesSelectClass: '',
            districtsSelectClass: '',
            inputClass: '',
            smallClass: '',
        },
        gender:{
            checkLabelClass: '',
            smallClass: ''
        },
        email:{
            format: false,
            inputClass: '',
            smallClass: ''
        },
        interest:{
            checkLabelClass:'',
            smallClass:''
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
            //使用全部的component的function要回傳布林值，在function做完資料判斷後，宣告變數為布林值，就可以在component直接變更class
            //回傳的布林值做是否要顯示"送出成功!"文字
            let nameError = this.$refs.nameRef.isError
            this.name.inputClass = this.setElementClass(nameError, "input", false)
            this.name.smallClass = this.setElementClass(nameError, "text", false)

            let birthdayYearError = this.$refs.birthdayRef.isYearError
            let birthdayMonthError = this.$refs.birthdayRef.isMonthError
            let birthdayDayError = this.$refs.birthdayRef.isDayError
            let birthdayError = (birthdayYearError && birthdayMonthError && birthdayDayError) ? true : false
            this.birthday.icomplete = this.$refs.birthdayRef.isRemind
            this.birthday.yearSelectClass = this.setElementClass(birthdayYearError, "select", this.birthday.icomplete)
            this.birthday.monthSelectClass = this.setElementClass(birthdayMonthError, "select", this.birthday.icomplete)
            this.birthday.daySelectClass = this.setElementClass(birthdayDayError, "select", this.birthday.icomplete)
            this.birthday.smallClass = this.setElementClass(birthdayError, "text", this.birthday.icomplete)

            let addressCountiesError = this.$refs.addressRef.isCountiesError
            let addressDistrictsError = this.$refs.addressRef.isDistrictsError
            let addressInputError = this.$refs.addressRef.isInputError
            let addressError = (addressCountiesError && addressDistrictsError && addressInputError) ? true : false
            this.address.icomplete = this.$refs.addressRef.isRemind
            this.address.countiesSelectClass = this.setElementClass(addressCountiesError, "select", this.address.icomplete)
            this.address.districtsSelectClass = this.setElementClass(addressDistrictsError, "select", this.address.icomplete)
            this.address.inputClass = this.setElementClass(addressInputError, "input", this.address.icomplete)
            this.address.smallClass = this.setElementClass(addressError, "text", this.address.icomplete)

            let genderError = this.$refs.genderRef.isError
            this.gender.checkLabelClass = this.setElementClass(genderError, "checklabel", false)
            this.gender.smallClass = this.setElementClass(genderError, "text", false)

            let emailError = this.$refs.emailRef.isError
            this.email.format = this.$refs.emailRef.isFormat
            this.email.inputClass = this.setElementClass(emailError, "input", false)
            this.email.smallClass = this.setElementClass(emailError, "text", this.email.format)

            let interestError = this.$refs.interestRef.isError
            this.interest.checkLabelClass = this.setElementClass(interestError, "checklabel", false)
            this.interest.smallClass = this.setElementClass(interestError, "text", false)

            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
            }
            
        }
    }
})
