<template>
    <button id="show">{{ showText }}</button>
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
    }
    // created: function () {
    //     bus.$on('CountiesData', CountiesData);
    //     bus.$on('DistrictsData', DistrictsData);
    // }
}
</script>>