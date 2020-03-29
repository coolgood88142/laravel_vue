<template>
     <select v-model="countiesSelected" id="us_counties" name="us_counties" :class="select_class" @change="$emit('change-counties', countiesSelected)">
        <option value="0" disabled selected>--請選擇--</option>
        <option v-for="(counties, index) in counties_array" :key="index" :value="counties.value">{{ counties.text }}</option>
    </select>
</template>

<script>
export default {
    props: {
        select_class: {
            type:String
        },
        counties_data:{
            type:Array
        },
        countiesSelected:{
            type:Number
        }
    },
    data:function(){
        return {
            counties_array: this.counties_data
        }
    }
}
</script>