<template>
    <div class="form-group">
        <h3 :class="[interest_error ? errorColor : textColor]">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" v-model="interestChecked" :id="interest.id" :value="interest.value">
            <label class="form-check-label" :for="interest.id">{{ interest.text }}</label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        interest_error:{
            type:Boolean
        }
    },
    data:function(){
        return {
            interestText: '興趣(複)',
            interest_array: [
                { id:'interest0', text: '運動', value: 0 },
                { id:'interest1', text: '上網', value: 1 },
                { id:'interest2', text: '其他', value: 2}
            ],
            interestChecked: [],
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    }
}
</script>>