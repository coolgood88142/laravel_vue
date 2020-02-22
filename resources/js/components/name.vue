<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="input_class" id="us_name" name="us_name" v-model="nameValue"/>
        <small id="warning" :class="small_class">{{ warningText }}</small>
     </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    //Boolean要怎麼接受後，要怎麼觸發function判斷
    //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
    props: {
        input_class: {
            type:String
        },
        small_class: {
            type:String
        }
    },
    mixins: [classdata],
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            warningText: '姓名必填'
        }
    },
    methods:{
        getNameIsError:function(value){
            return classdata.methods.isValueNullOrEmpty([value])
        }
    },
    watch:{
        nameValue(newVal){
            this.$emit('input-value', newVal);
        }
    }

}
</script>