<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ nameText }}</h3>
        <input type="textbox" :class="inputClass" id="us_name" name="us_name" v-model="name_value"/>
        <small id="warning" :class="smallClass">{{ warningText }}</small>
     </div>
</template>

<script>
import classdata from './mixins/class.js';

export default {
    //Boolean要怎麼接受後，要怎麼觸發function判斷
    //使用mixins回傳ture或false，就不用寫ifelse，目的是要讓程式減少重複性
    mixins: [classdata],
    data:function(){
        return {
            nameText: '姓名',
            nameError:false,
            name_value: '',
            name_check:false,
            name_warning : false,
            warningText: '姓名必填',
            inputClass: 'form-control border',
            smallClass: 'form-text'
        }
    },
    methods:{
        getNameIsError:function(){
            if(this.name_value != ''){
                this.nameError = false
            }else{
                this.nameError = true
            }
            return this.nameError
        }
    }

}
</script>