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
    props:{
        check_label_class:{
            type:String
        },
        small_class: {
            type:String
        },
    },
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
    watch:{
        genderChecked(newVal){
            this.isError = this.isValueNullOrEmpty(newVal)
        },
        check_label_class(newVal){
            this.checkLabelClass = newVal
        },
        small_class(newVal){
            this.smallClass = newVal
        }
    }
}
</script>