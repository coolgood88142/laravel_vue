<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="inputClass" id="us_email" name="us_email" v-model="emailValue">
        <small id="warning" :class="smallClass">{{ wrong_format ? remindText : warningText }}</small>
    </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    props: {
        input_class: {
            type:String
        },
        small_class: {
            type:String
        },
        wrong_format: {
            type:Boolean
        }
    },
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
        getEmailIsError:function(value){
            if(this.isValueNullOrEmpty(value)){
                this.isError = true
                this.isFormat = false
            }else{
                let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
                if (!isMail.test(value)) {
                    this.isError = true
                    this.isFormat = true
                }else{
                    this.isError = false
                    this.isFormat = false
                }
            }
        }
    },
    watch:{
        emailValue(newVal){
            this.getEmailIsError(newVal)
        },
        input_class(newVal){
            this.inputClass = newVal
        },
        small_class(newVal){
            this.smallClass = newVal
        }
    }
}
</script>