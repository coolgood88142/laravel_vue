<template>
    <div class="form-group">
        <h3 :class="[nameStyle ? errorColor : styleObject]">{{ nameText }}</h3>
        <input type="textbox" class="form-control" id="us_name" name="us_name" :value="nameValue"/>
     </div>
</template>

<script>
export default {
    prop:{
        nameStyle:Boolean
    },
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            errorColor: 'text-danger',
            styleObject: 'text-black font-weight-bold'
        }
    }
}
</script>>