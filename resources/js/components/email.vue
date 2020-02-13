<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="[email_error ? errorColor : borderColor]" id="us_email">
        <small id="warning" :class="[email_warning ? (email_format ? remindTextStyle : errorTextStyle) : smallText]">{{ email_format ? remindText : warningText }}</small>
    </div>
</template>

<script>
export default {
    props: {
        email_error:{
            type:Boolean
        },
        email_warning:{
            type:Boolean
        },
        email_format:{
            type:Boolean
        }
    },
    data:function(){
        return {
            emailText: 'email',
            warningText: 'email必填',
            remindText:'email格式錯誤',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorTextStyle: 'form-text text-danger',
            remindTextStyle: 'form-text text-black',
            smallText: 'form-text d-none'
        }
    }
}
</script>