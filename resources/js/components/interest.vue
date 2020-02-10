<template>
    <div class="form-group">
        <h3 :class="[isError ? errorColor : textColor]">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" v-model="interest.id" :id="interest.id" :value="interest.value" :checked="interest.checked">
            <label class="form-check-label">{{ interest.text }}</label>
        </div>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            interestText: '興趣(複)',
            interest_array: [
                { id:'interest0', text: '運動', value: 0, checked: false },
                { id:'interest1', text: '上網', value: 1, checked: false },
                { id:'interest2', text: '其他', value: 2, checked: false }
            ],
            isError:false,
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    },
    watch:{
        interest0(newValue){
            newValue.checked
        }
    }
}
</script>>