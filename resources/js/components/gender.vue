<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
            <input class="form-check-input" type="radio" name="gender" v-model="genderChecked" :id="gender.id" :value="gender.value">
            <label :class="[gender_error ? errorColor : textColor]" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small id="warning" :class="[gender_warning ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
export default {
    props: {
        gender_error:{
            type:Boolean
        },
        gender_warning:{
            type:Boolean
        }
    },
    data:function(){
        return {
            genderText: '性別',
            genderChecked: '',
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ],
            warningText: '性別必填',
            errorColor: 'text-danger form-check-label',
            textColor: 'text-black form-check-label',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    }
}
</script>