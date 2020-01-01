<template>
    <button id="show" @click="ShowPostalCode">{{ showText }}</button>
</template>

<script>
import bus from '../bus.js'
let CountiesData = '';
let DistrictsData = '';
export default {
    data:function(){
        return {
            showText: '顯示郵遞區號!'
        }
    },
    methods: {
        ShowPostalCode(){
            console.log(CountiesData);
        }
    },
    // created: function () {
    //     bus.$on('CountiesData', CountiesData);
    //     bus.$on('DistrictsData', DistrictsData);
    // }
}
</script>>