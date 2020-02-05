<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" class="form-control" id="us_name" name="us_name" :value="nameValue"/>
     </div>
</template>

<script>
export default {
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
        }
    }
}
</script>>