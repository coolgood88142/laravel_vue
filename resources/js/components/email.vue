<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="[email_error ? errorColor : borderColor]" id="us_email" v-model="email_value" @change="$emit('keyup-email', email_value)">
        <small id="warning" :class="[email_warning ? (email_format ? remindTextStyle : errorTextStyle) : smallText]">{{ email_format ? remindText : warningText }}</small>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            emailText: 'email',
            email_value: '',
            email_error: false,
            email_warning: false,
            email_format: false,
            warningText: 'email必填',
            remindText:'email格式錯誤',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorTextStyle: 'form-text text-danger',
            remindTextStyle: 'form-text text-secondary',
            smallText: 'form-text d-none'
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