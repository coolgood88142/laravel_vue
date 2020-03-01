<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" name="us_interest" :id="interest.id" :value="interest.value" v-model="interestChecked">
            <label :class="checkLabelClass" :for="interest.id">{{ interest.text }}</label>
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
            interestText: '興趣(複)',
            interestChecked: [],
            interest_array: [
                { id:'interest0', text: '運動', value: 0 },
                { id:'interest1', text: '上網', value: 1 },
                { id:'interest2', text: '其他', value: 2}
            ],
            warningText: '興趣必填',
            isError: true,
            checkLabelClass: this.getCheckLabelClass(),
            smallClass: this.getTextClass()
        }
    },
    methods:{
        getInterestIsError: function(){
            this.isError = this.isValueNullOrEmpty(this.interestChecked)
            this.checkLabelClass = this.setElementClass(this.isError, "checklabel", false)
            this.smallClass = this.setElementClass(this.isError, "text", false)

            return this.isError
        }
    },
    watch:{
        interestChecked(newVal){
            this.getInterestIsError()
        }
    }
}
</script>