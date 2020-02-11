<template>
    <div class="form-group">
        <h3 :class="[name_error ? errorColor : textColor]">{{ nameText }}</h3>
        <input type="textbox" class="form-control" id="us_name" name="us_name" v-model="nameValue"/>
     </div>
</template>

<script>
export default {
    props: {
        name_error:{
            type:Boolean
        }
    },
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    }
}
</script>>