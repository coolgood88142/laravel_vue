import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'
import swal from 'sweetalert'
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
        send: function (url) {
            let nameError = this.$refs.name.getNameIsError()
            let birthdayError = this.$refs.birthday.getBirthdayIsError()
            let addressError = this.$refs.address.getAddressIsError()
            let genderError = this.$refs.gender.getGenderIsError()
            let emailError = this.$refs.email.getEmailIsError()
            let interestError = this.$refs.interest.getInterestIsError()

            if (!nameError && !birthdayError && !addressError && !genderError && !emailError && !interestError){
                this.post(url)
            }
        },
        post:function (url){
            let params = {
                id: document.getElementById('us_id').value,
                name : this.$refs.name.getNameValue(),
                birthday: this.$refs.birthday.getBirthdayValue(),
                counties: this.$refs.address.getCountiesValue(),
                districts: this.$refs.address.getDistrictsValue(),
                road: this.$refs.address.getRoadValue(),
                gender: this.$refs.gender.getGenderValue(),
                email: this.$refs.email.getEmailValue(),
                interest: this.$refs.interest.getInterestValue()
            }
            
            //新增try catch 防呆錯誤sweet alert顯示新增錯誤或更新錯誤
            axios.post(url, params).then(function (response) {
                if (response.data.status == 'success'){
                    swal({
                        title: response.data.message,
                        confirmButtonColor: "#e6b930",
                        icon:response.data.status,
                        showCloseButton: true
                    }).then(function() {
                        window.location = response.data.url
                    });
                }
                console.log(response)
            }).catch((error) => {

                //顯示請求資料失敗的錯誤訊息
                if (error.response) {
                    //在log顯示response錯誤的資料、狀態、表頭
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else {
                    //在log顯示r錯誤訊息
                    console.log('Error', error.message);
                }
                
            })
        }
    }
})
