<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
            <input class="form-check-input" type="radio" name="gender" v-model="gender_checked" :id="gender.id" :value="gender.value" @change="$emit('change-gender', gender_checked)">
            <label :class="[gender_error ? errorColor : textColor]" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small id="warning" :class="[gender_warning ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
import classdata from '../class.js';
export default {
    mixins: [classdata],
    data:function(){
        return {
            genderText: '性別',
            gender_error: false,
            gender_warning: false,
            gender_checked: '',
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ],
            warningText: '性別必填',
            errorColor: this.getCheckBoxClass().error,
            textColor: this.getCheckBoxClass().success,
            errorText: this.getTextClass().error,
            smallText: this.getTextClass().success
        }
    }
}
</script>