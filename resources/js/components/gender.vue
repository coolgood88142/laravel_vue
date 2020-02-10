<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline" v-for="(gender, index) in gender_array" :key="index">
             <input class="form-check-input" type="radio" name="gender" :id="gender.id" v-model="genderValue" :value="gender.value">
            <label class="form-check-label">{{ gender.text }}</label>
         </div>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            genderText: '性別',
            genderValue: 'R',
            gender_array:[
                { id:'gender0', text: '男', value: 'R' },
                { id:'gender1', text: '女', value: 'S' }
            ]
        }
    }
}
</script>>