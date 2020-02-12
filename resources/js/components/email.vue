<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="[email_error ? errorColor : borderColor]" id="us_email" v-model="emailValue">
        <small id="warning" :class="[email_warning ? errorText : smallText]">{{ warningText }}</small>
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
        }
    },
    data:function(){
        return {
            emailText: 'email',
            emailValue: '',
            warningText: 'email必填',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    },
    watch:{
        emailValue(newValue){
            if(newValue == ''){
                this.email_warning = true
            }else{
                this.email_warning = false
            }
        }
    }
}
</script>