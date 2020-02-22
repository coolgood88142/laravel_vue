<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ emailText }}</h3>
        <input type="email" :class="input_class" id="us_email" v-model="emailValue">
        <small id="warning" :class="small_class">{{ wrong_format ? remindText : warningText }}</small>
    </div>
</template>

<script>
import classdata from './mixins/class.js';

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
    mixins: [classdata],
    data:function(){
        return {
            emailText: 'email',
            emailValue: '',
            warningText: 'email必填',
            remindText:'email格式錯誤'
        }
    },
    methods:{
        getEmailIsError:function(value){
            let errorData = {}
            if(classdata.methods.isValueNullOrEmpty([value])){
                errorData.isError = true
                errorData.isFormat = false
            }else{
                let isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
                if (!isMail.test(value)) {
                    errorData.isError = true
                    errorData.isFormat = true
                }else{
                    errorData.isError = false
                    errorData.isFormat = false
                }
            }
            return errorData
        }
    },
    watch:{
        emailValue(newVal){
            this.$emit('input-value', newVal);
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