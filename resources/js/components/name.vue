<template>
    <div class="form-group">
        <h3 :class="[isError ? errorColor : textColor]">{{ nameText }}</h3>
        <input type="textbox" class="form-control" id="us_name" name="us_name" v-model="nameValue"/>
     </div>
</template>

<script>
export default {
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            isError:false,
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
        }
    },
    watch:{
        nameValue(newValue){
            if(newValue ==  ''){
                this.isError = true
            }else{
                this.isError = false
            }
        }
    }
}
</script>>