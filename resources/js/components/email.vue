<template>
    <div class="form-group">
        <h3 :class="[isError ? errorColor : textColor]">{{ emailText }}</h3>
        <input type="email" class="form-control" id="us_email" v-model="emailValue">
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            emailText: 'email',
            emailValue: '',
            isError:false,
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    },
    watch:{
        emailValue(newValue){
            var isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (!isMail.test(newValue)) {
                this.isError = true
            }else{
                this.isError = false
            }
        }
    }
}
</script>