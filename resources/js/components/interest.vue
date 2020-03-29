<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" name="us_interest[]" :id="interest.id" :value="interest.value" v-model="userInterest">
            <label :class="checkLabelClass" :for="interest.id">{{ interest.text }}</label>
        </div>
        <small v-if="interestError" id="warning" :class="smallClass">{{ warningText }}</small>
    </div>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    props:{
        interestChecked:{
            type:Array
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
            warningText: '興趣必填',
            interestError: false,
            checkLabelClass: this.getCheckLabelClass(),
            smallClass: this.getTextClass(),
            userInterest: this.interestChecked
        }
    },
    methods: {
        getInterestIsError(){
            this.interestError = this.isValueNullOrEmpty(this.userInterest)
            this.checkLabelClass = this.setElementClass(this.interestError, "checklabel", false)
            this.smallClass = this.setElementClass(this.interestError, "text", false)
            return this.interestError
        },
        getInterestValue(){
            return this.userInterest
        }
    },
    watch:{
        userInterest(newVal){
            this.getInterestIsError()
        }
    }
}
</script>