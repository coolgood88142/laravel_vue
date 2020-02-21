<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
            <input class="form-check-input" type="radio" name="gender" v-model="gender_checked" :id="gender.id" :value="gender.value">
            <label :class="[genderError ? errorColor : textColor]" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small id="warning" :class="[genderError ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    mixins: [classdata],
    data:function(){
        return {
            genderText: '性別',
            genderError:false,
            gender_warning: false,
            gender_checked: '',
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ],
            warningText: '性別必填',
            errorColor: this.getCheckLabelClass(),
            textColor: this.getCheckLabelClass(),
            errorText: this.getTextClass(),
            smallText: this.getTextClass()
        }
    },
    methods:{
        getGenderIsError:function(){
            if(this.gender_checked != ''){
                this.genderError = false
            }else{
                this.genderError = true
            }
            return this.genderError
        }
    }
}
</script>