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
    methods: {
        getNameIsError: function(){
            this.isError = this.isValueNullOrEmpty(this.nameValue)
            this.inputClass = this.setElementClass(this.isError, "input", false)
            this.smallClass = this.setElementClass(this.isError, "text", false)

            return this.isError
        }
    },
    watch:{
        nameValue(newVal){
            this.getNameValueIsError()
        }
    }
}
</script>