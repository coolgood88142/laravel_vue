<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="inputClass" id="us_name" name="us_name" v-model="nameValue"/>
        <small v-if="nameError" id="warning" :class="smallClass">{{ warningText }}</small>
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
            nameError: false,
            inputClass: this.getInputClass(),
            smallClass: this.getTextClass()
        }
    },
    methods: {
        getNameIsError(){
            this.nameError = this.isValueNullOrEmpty(this.nameValue)
            this.inputClass = this.setElementClass(this.nameError, "input", false)
            this.smallClass = this.setElementClass(this.nameError, "text", false)
            return this.nameError
        }
    },
    watch:{
        nameValue(newVal){
            this.getNameIsError()
        }
    }
}
</script>