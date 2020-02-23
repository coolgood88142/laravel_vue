<template>
     <select v-model="counties_selected" id="counties" :class="select_class" @change="$emit('change-counties', counties_selected)">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(counties, index) in counties_array" :key="index" :value="counties.value">{{ counties.text }}</option>
    </select>
</template>

<script>
let counties_data =  [
    { text: '臺北市', value: 0 },
    { text: '基隆市', value: 1 },
    { text: '新北市', value: 2 },
    { text: '宜蘭縣', value: 3 },
    { text: '桃園市', value: 4 },
    { text: '新竹市', value: 5 },
    { text: '新竹縣', value: 6 },
    { text: '苗栗縣', value: 7 },
    { text: '臺中市', value: 8 },
    { text: '彰化縣', value: 9 },
    { text: '南投縣', value: 10 },
    { text: '嘉義市', value: 11 },
    { text: '嘉義縣', value: 12 },
    { text: '雲林縣', value: 13 },
    { text: '臺南市', value: 14 },
    { text: '高雄市', value: 15 },
    { text: '澎湖縣', value: 16 },
    { text: '金門縣', value: 17 },
    { text: '屏東縣', value: 18 },
    { text: '臺東縣', value: 19 },
    { text: '花蓮縣', value: 20 },
    { text: '連江縣', value: 21 }
];

export default {
    props: {
        select_class: {
            type:String
        }
    },
    data:function(){
        return {
            counties_array: counties_data,
            counties_selected: ''
        }
    }
}
</script>