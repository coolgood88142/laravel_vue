<template>
     <select v-model="counties_selected" id="counties" @change="$emit('change-counties', counties_selected)">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(counties, index) in counties_array" :key="index" :value="counties.value">{{ counties.text }}</option>
    </select>
</template>

<script>
let counties_data =  [
    { text: '台北市', value: 0 },
    { text: '基隆市', value: 1 },
    { text: '新北市', value: 2 }
];

export default {
    data:function(){
        return {
            counties_array: counties_data,
            counties_selected: ''
        }
    }
}
</script>