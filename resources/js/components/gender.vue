<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
            <input class="form-check-input" type="radio" name="gender" v-model="genderChecked" :id="gender.id" :value="gender.value">
            <label :class="check_label_class" :for="gender.id">{{ gender.text }}</label>
        </div>
        <small id="warning" :class="small_class">{{ warningText }}</small>
    </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    props:{
        check_label_class:{
            type:String
        },
        small_class: {
            type:String
        },
    },
    mixins: [classdata],
    data:function(){
        return {
            genderText: '性別',
            genderChecked: '',
            genderError:false,
            gender_warning: false,
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ],
            warningText: '性別必填'
        }
    },
    methods:{
        getGenderIsError:function(value){
            return classdata.methods.isValueNullOrEmpty([value])
        }
    },
    watch:{
        genderChecked(newVal){
            this.$emit('check-label-value', newVal);
        }
    }
}
</script>