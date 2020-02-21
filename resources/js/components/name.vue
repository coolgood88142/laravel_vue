<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="inputClass" id="us_name" name="us_name" v-model="nameValue"/>
        <small id="warning" :class="smallClass">{{ warningText }}</small>
     </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    //Boolean要怎麼接受後，要怎麼觸發function判斷
    //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
    props: {
        name_value : {
            type:String
        },
        input_class : {
            type:String
        },
        small_class : {
            type:String
        }
    },
    mixins: [classdata],
    data:function(){
        return {
            nameText: '姓名',
            nameValue: this.name_value,
            nameError:false,
            name_check:false,
            name_warning : false,
            warningText: '姓名必填',
            inputClass: this.input_class,
            smallClass: this.small_class
        }
    },
    methods:{
        getNameIsError:function(value){
            let isError = classdata.methods.isValueNullOrEmpty([value])
            this.inputClass = classdata.methods.setElementClass(isError, "input", false)
            this.smallClass = classdata.methods.setElementClass(isError, "text", false)

            return true
        }
    },
    watch:{
        nameValue(newVal){
            this.$emit('input', newVal);
        },
        name_value(newVal){
            this.nameValue = newVal
        },
        input_class(newVal){
            this.inputClass = newVal
        }
    }

}
</script>