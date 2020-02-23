<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="inputClass" id="us_name" name="us_name" v-model="nameValue"/>
        <small id="warning" :class="smallClass">{{ warningText }}</small>
     </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    //Boolean要怎麼接受後，要怎麼觸發function判斷
    //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
    props: {
        input_class:{
            type:String
        },
        small_class:{
            type:String
        }
    },
    mixins: [verification],
    data:function(){
        return {
            nameText: '姓名',
            warningText: '姓名必填',
            nameValue: '',
            isError: true,
            inputClass: this.getInputClass(),
            smallClass: this.getTextClass()
        }
    },
    watch:{
        nameValue(newVal){
            this.isError = this.isValueNullOrEmpty(newVal)
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