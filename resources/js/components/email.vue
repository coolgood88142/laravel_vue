<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="inputClass" id="us_email" name="us_email" v-model="emailValue">
        <small id="warning" :class="smallClass">{{ isFormat ? remindText : warningText }}</small>
    </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    data:function(){
        return {
            emailText: 'email',
            emailValue: '',
            warningText: 'email必填',
            remindText:'email格式錯誤',
            isError: true,
            isFormat: false,
            inputClass: this.getInputClass(),
            smallClass: this.getTextClass()
        }
    },
    methods:{
        getEmailIsError: function(){
            let emailError = this.isValueNullOrEmpty(this.emailValue)
            
            if(emailError){
                this.isError = true
                this.isFormat = false
            }else{
                let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
                if (!isMail.test(this.emailValue)) {
                    this.isError = true
                    this.isFormat = true
                }else{
                    this.isError = false
                    this.isFormat = false
                }
            }

            this.inputClass = this.setElementClass(emailError, "input", false)
            this.smallClass = this.setElementClass(emailError, "text", this.isFormat)

            return this.isError
        }
    },
    watch:{
        emailValue(newVal){
            this.getEmailIsError()
        }
    }
}
</script>