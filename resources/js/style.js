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
        nameInputClass: '',
        nameSmallClass: '',
        birthdayIcomplete: false,
        birthdayYearSelectClass: '',
        birthdayMonthSelectClass: '',
        birthdayDaySelectClass: '',
        birthdaySmallClass: '',
        addressIcomplete: false,
        addressCountiesSelectClass: '',
        addressDistrictsSelectClass: '',
        addressInputClass: '',
        addressSmallClass: '',
        genderCheckLabelClass: '',
        genderSmallClass: '',
        emailFormat:false,
        emailInputClass: verification.methods.getInputClass(),
        emailSmallClass: verification.methods.getTextClass(),
        interestCheckLabelClass: verification.methods.getCheckLabelClass(),
        interestSmallClass: verification.methods.getTextClass(),
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
            this.nameInputClass = this.setElementClass(nameError, "input", false)
            this.nameSmallClass = this.setElementClass(nameError, "text", false)

            let birthdayYearError = this.$refs.birthdayRef.isYearError
            let birthdayMonthError = this.$refs.birthdayRef.isMonthError
            let birthdayDayError = this.$refs.birthdayRef.isDayError
            let birthdayError = (birthdayYearError && birthdayMonthError && birthdayDayError) ? true : false
            this.birthdayIcomplete = this.$refs.birthdayRef.isRemind
            this.birthdayYearSelectClass = this.setElementClass(birthdayYearError, "select", this.birthdayIcomplete)
            this.birthdayMonthSelectClass = this.setElementClass(birthdayMonthError, "select", this.birthdayIcomplete)
            this.birthdayDaySelectClass = this.setElementClass(birthdayDayError, "select", this.birthdayIcomplete)
            this.birthdaySmallClass = this.setElementClass(birthdayError, "text", this.birthdayIcomplete)

            let addressCountiesError = this.$refs.addressRef.isCountiesError
            let addressDistrictsError = this.$refs.addressRef.isDistrictsError
            let addressInputError = this.$refs.addressRef.isInputError
            let addressError = (addressCountiesError && addressDistrictsError && addressInputError) ? true : false
            this.addressIcomplete = this.$refs.addressRef.isRemind
            this.addressCountiesSelectClass = this.setElementClass(addressCountiesError, "select", this.addressIcomplete)
            this.addressDistrictsSelectClass = this.setElementClass(addressDistrictsError, "select", this.addressIcomplete)
            this.addressInputClass = this.setElementClass(addressInputError, "input", this.addressIcomplete)
            this.addressSmallClass = this.setElementClass(addressError, "text", this.addressIcomplete)

            let genderError = this.$refs.genderRef.isError
            this.genderCheckLabelClass = this.setElementClass(genderError, "checklabel", false)
            this.genderSmallClass = this.setElementClass(genderError, "text", false)

            let emailError = this.$refs.emailRef.isError
            this.emailFormat = this.$refs.emailRef.isFormat
            this.emailInputClass = this.setElementClass(emailError, "input", false)
            this.emailSmallClass = this.setElementClass(emailError, "text", this.emailFormat)

            let interestError = this.$refs.interestRef.isError
            this.interestCheckLabelClass = this.setElementClass(interestError, "checklabel", false)
            this.interestSmallClass = this.setElementClass(interestError, "text", false)

            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                alert('送出成功!')
            }
            
        }
    }
})
