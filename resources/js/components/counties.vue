<template>
     <select v-model="counties_selected" id="us_counties" name="us_counties" :class="select_class" @change="$emit('change-counties', counties_selected)">
        <option value="" disabled selected>--請選擇--</option>
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
        }
    },
    data:function(){
        return {
            counties_array: this.counties_data,
            counties_selected: ''
        }
    }
}
</script>