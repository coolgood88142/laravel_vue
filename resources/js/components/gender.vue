<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
            <input class="form-check-input" type="radio" name="us_gender" v-model="genderChecked" :id="gender.id" :value="gender.value">
            <label :class="checkLabelClass" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small id="warning" :class="smallClass">{{ warningText }}</small>
    </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    data:function(){
        return {
            genderText: '性別',
            genderChecked: '',
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ],
            warningText: '性別必填',
            isError: true,
            checkLabelClass:this.getCheckLabelClass(),
            smallClass:this.getTextClass()

        }
    },
    methods:{
        getGenderIsError: function(){
            this.isError = this.isValueNullOrEmpty(this.genderChecked)
            this.checkLabelClass = this.setElementClass(this.isError, "checklabel", false)
            this.smallClass = this.setElementClass(this.isError, "text", false)

            return this.isError
       }
    },
    watch:{
        genderChecked(newVal){
            this.getGenderIsError()
        }
    }
}
</script>