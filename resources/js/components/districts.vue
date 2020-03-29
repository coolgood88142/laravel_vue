<template>
    <select v-model="districtsSelected" id="us_districts" name="us_districts" :class="select_class" @change="$emit('change-districts', districtsSelected)">
        <option value="0" disabled selected>--請選擇--</option>
        <option v-for="(districts, index) in districts_array" :key="index" :value="districts.value">{{ districts.text }}</option>
    </select>
</template>

<script>
export default {
    props: {
        counties_selected_text:{
            type:String
        },
        select_class: {
            type:String
        },
        districts_data:{
            type:Object
        },
        districtsSelected:{
            type:Number
        }
    },
    computed: {
        districts_array(){
            if (this.counties_selected_text != '' ){
                return this.districts_data[this.counties_selected_text];
            }
        }
    },
    data:function(){
        return {
            districts:[]
        }
    }
}
</script>>