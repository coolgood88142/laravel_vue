<template>
     <div class="form-group">
         <input type="button" :class="btnStyle" :value="btnText" v-on:click="send()">
     </div>
</template>

<script>
export default {
    props: {
        select_class: {
            type:String
        }
    },
    data:function(){
        return {
            btnStyle: 'btn btn-primary',
            btnText: '編輯'
        }
    }
}
</script>