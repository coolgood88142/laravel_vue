<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" :id="interest.id" :value="interest.value" v-model="interest_checked" @change="$emit('change-interest', interest_checked)">
            <label :class="[interest_error ? errorColor : textColor]" :for="interest.id">{{ interest.text }}</label>
        </div>
        <small id="warning" :class="[interest_error ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
import classdata from '../class.js';

export default {
    mixins: [classdata],
    props: {
        interest_error:{
            type:Boolean
        }
    },
    data:function(){
        return {
            interestText: '興趣(複)',
            interest_checked: '',
            interest_error: false,
            interest_warning: false,
            interest_array: [
                { id:'interest0', text: '運動', value: 0 },
                { id:'interest1', text: '上網', value: 1 },
                { id:'interest2', text: '其他', value: 2}
            ],
            warningText: '興趣必填',
            errorColor: this.getCheckBoxClass().error,
            textColor: this.getCheckBoxClass().success,
            errorText: this.getTextClass().error,
            smallText: this.getTextClass().success
        }
    }

    // let interest0 = document.getElementById("interest0");
    //         let interest1 = document.getElementById("interest1");
    //         let interest2 = document.getElementById("interest2");

    //         if (interest0.checked != true && interest1.checked != true && interest2.checked != true){
    //             this.interestStyle.Error = true
    //             this.interestStyle.Warning = true
    //         }else{
    //             this.interestStyle.Error = false
    //             this.interestStyle.Warning = false
    //         }
}
</script>