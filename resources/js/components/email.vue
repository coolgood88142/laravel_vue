<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="[emailError ? errorColor : borderColor]" id="us_email" v-model="email_value" @change="$emit('email-error', emailError)">
        <small id="warning" :class="[emailError ? (email_format ? remindTextStyle : errorTextStyle) : smallText]">{{ email_format ? remindText : warningText }}</small>
    </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    mixins: [classdata],
    data:function(){
        return {
            emailText: 'email',
            emailError: false,
            email_value: '',
            // emailError: [
            //     {textError : false},
            //     {formatError: false}
            // ],
            email_warning: false,
            email_format: false,
            warningText: 'email必填',
            remindText:'email格式錯誤',
            errorColor: this.getInputClass(),
            borderColor: this.getInputClass(),
            errorTextStyle: this.getTextClass(),
            remindTextStyle: this.getTextClass(),
            smallText: this.getTextClass()
        }
    },
    methods:{
        getEmailIsError:function(){
            if(this.email_value == ''){
                this.emailError = true
            }else{
                let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
                if (!isMail.test(this.email_value)) {
                    this.emailError = true
                }else{
                    this.emailError = false
                }
            }
            return this.emailError
        }
    }

    // let us_email = document.getElementById("us_email");
    //         let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;

    //         if (us_email.value == '') {
    //             this.emailStyle.Error = true
    //             this.emailStyle.Warning = true
    //         } else {
    //             if (!isMail.test(us_email.value)) {
    //                 this.emailStyle.Error = true
    //                 this.emailStyle.Format = true
    //             } else {
    //                 this.emailStyle.Error = false
    //                 this.emailStyle.Format = false
    //                 this.emailStyle.Warning = false
    //             }
    //         }
}
</script>