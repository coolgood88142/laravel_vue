<template>
     <select v-model="counties_selected" id="counties" @change="UpdateDistricts">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(counties, index) in counties_array" :key="counties.value" :value="index">{{ counties.text }}</option>
    </select>
</template>

<script>
import bus from '../bus.js'
export default {
    data:function(){
        return {
            counties_array: [
                { text: '台北市', value: 'A' },
                { text: '基隆市', value: 'B' },
                { text: '新北市', value: 'C' }
            ],
            counties_selected: ''
        }
    },
    methods: {
        UpdateDistricts(){
            let data = [this.counties_array, this.counties_selected];
            bus.$emit('UpdateDistricts', this.counties_selected);
            bus.$emit('CountiesData', data);
        }
    }
}
</script>>