<template>
    <div class="form-group">
        <h3 :class="[email_error ? errorColor : textColor]">{{ emailText }}</h3>
        <input type="email" class="form-control" id="us_email">
    </div>
</template>

<script>
export default {
    props: {
        email_error:{
            type:Boolean
        }
    },
    data:function(){
        return {
            emailText: 'email',
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    }
}
</script>