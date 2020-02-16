<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="[name_error ? errorColor : borderColor]" id="us_name" name="us_name" :value="nameValue"/>
        <small id="warning" :class="[name_warning ? errorText : smallText]">{{ warningText }}</small>
     </div>
</template>

<script>
export default {
    props: {
        name_check:{
            type:Boolean
        }
    },
    computed:{
        //Boolean要怎麼接受後，要怎麼觸發function判斷
        //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
        name_error(){
            if(this.nameValue != ''){
                this.name_check = true
                return true
            }else{
                this.name_check = false
                return false
            }
        }
    },
    data:function(){
        return {
            nameText: '姓名',
            nameValue: '',
            name_error: false,
            name_warning : false,
            warningText: '姓名必填',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
        }
    }

}
</script>