<template>
     <select v-model="counties_selected" id="counties" @change="$emit('update-districts', counties_selected)">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(counties, index) in counties_array" :key="index" :value="counties.value">{{ counties.text }}</option>
    </select>
</template>

<script>
export default {
    data:function(){
        return {
            counties_array: [
                { text: '台北市', value: 0 },
                { text: '基隆市', value: 1 },
                { text: '新北市', value: 2 }
            ],
            counties_selected: ''
        }
    }
}
</script>>