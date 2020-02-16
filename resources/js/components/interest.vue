<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline" v-for="(interest, index) in interest_array" :key="index">
            <input class="form-check-input" type="checkbox" :id="interest.id" :value="interest.value">
            <label :class="[interest_error ? errorColor : textColor]" :for="interest.id">{{ interest.text }}</label>
        </div>
        <small id="warning" :class="[interest_warning ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            interestText: '興趣(複)',
            interest_error: false,
            interest_warning: false,
            interest_array: [
                { id:'interest0', text: '運動', value: 0 },
                { id:'interest1', text: '上網', value: 1 },
                { id:'interest2', text: '其他', value: 2}
            ],
            warningText: '興趣必填',
            errorColor: 'text-danger form-check-label',
            textColor: 'text-black form-check-label',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    }

    // let interest0 = document.getElementById("interest0");
    //         let interest1 = document.getElementById("interest1");
    //         let interest2 = document.getElementById("interest2");

    //         if (interest0.checked != true && interest1.checked != true && interest2.checked != true){
    //             this.interestStyle.Error = true
    //             this.interestStyle.Warning = true
    //         }else{
    //             this.interestStyle.Error = false
    //             this.interestStyle.Warning = false
    //         }
}
</script>