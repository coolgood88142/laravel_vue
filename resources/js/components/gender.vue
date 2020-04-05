<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in genderArray" :key="index">
            <input class="form-check-input" type="radio" name="us_gender[]" v-model="userGender" :value="gender.value">
            <label :class="checkLabelClass" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small v-if="genderError" id="warning" :class="smallClass">{{ warningText }}</small>
    </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    props:{
        genderChecked:{
            type:String
        },
        genderData:{
            type:Array
        }
    },
    data:function(){
        return {
            //gender_array在後端組資料丟進來，id不要用
            genderText: '性別',
            genderArray: this.genderData,
            warningText: '性別必填',
            genderError: false,
            checkLabelClass:this.getCheckLabelClass(),
            smallClass:this.getTextClass(),
            userGender: this.genderChecked

        }
    },
    methods: {
        getGenderIsError(){
            this.genderError = this.isValueNullOrEmpty(this.userGender)
            this.checkLabelClass = this.setElementClass(this.genderError, "checklabel", false)
            this.smallClass = this.setElementClass(this.genderError, "text", false)
            return this.genderError
        },
        getGenderValue(){
            return this.userGender
        }
    },
    watch:{
        userGender(newVal){
            this.getGenderIsError()
        }
    }
}
</script>