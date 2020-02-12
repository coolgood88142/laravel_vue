<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="[name_error ? errorColor : borderColor]" id="us_name" name="us_name" v-model="nameValue"/>
        <small id="warning" :class="[name_warning ? errorText : smallText]">{{ warningText }}</small>
     </div>
</template>

<script>
export default {
    props: {
        name_error:{
            type:Boolean
        },
        name_warning:{
            type:Boolean
        }
    },
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            warningText: '姓名必填',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    }
}
</script>>