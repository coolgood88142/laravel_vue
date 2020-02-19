<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="[email_error ? errorColor : borderColor]" id="us_email" v-model="email_value" @change="$emit('keyup-email', email_value)">
        <small id="warning" :class="[email_error ? (email_warning ? remindTextStyle : errorTextStyle) : smallText]">{{ email_warning ? remindText : warningText }}</small>
    </div>
</template>

<script>
import classdata from '../class.js';

export default {
    mixins: [classdata],
    props: {
        email_error:{
            type:Boolean
        },
        email_warning:{
            type:Boolean
        },
    },
    data:function(){
        return {
            emailText: 'email',
            email_value: '',
            email_error: false,
            email_warning: false,
            email_format: false,
            warningText: 'email必填',
            remindText:'email格式錯誤',
            errorColor: this.getTextBoxClass().error,
            borderColor: this.getTextBoxClass().success,
            errorTextStyle: this.getTextClass().error,
            remindTextStyle: this.getTextClass().remind,
            smallText: this.getTextClass().success
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