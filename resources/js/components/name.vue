<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="[name_error ? errorColor : borderColor]" id="us_name" name="us_name" v-model="name_value" @change="$emit('name-error', nameError)"/>
        <small id="warning" :class="[name_warning ? errorText : smallText]">{{ warningText }}</small>
     </div>
</template>

<script>
export default {
    //Boolean要怎麼接受後，要怎麼觸發function判斷
    //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
    data:function(){
        return {
            nameText: '姓名',
            nameError:false,
            name_value: '',
            name_check:false,
            name_error: false,
            name_warning : false,
            warningText: '姓名必填',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    },
    watch:{
        name_value(newValue){
            if(newValue != ''){
                this.nameError = true
            }else{
                this.nameError = false
            }
        }
    }

}
</script>