<template>
    <select v-model="districts_selected" id="us_districts" name="us_districts" :class="select_class" @change="$emit('change-districts', districts_selected)">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(districts, index) in districts_array" :key="index" :value="districts.value">{{ districts.text }}</option>
    </select>
</template>

<script>
export default {
    props: {
        counties_selected:{
            type:Number
        },
        select_class: {
            type:String
        },
        districts_data:{
            type:Array
        }
    },
    computed: {
        districts_array(){
            if (this.counties_selected != NaN ){
                this.districts_selected = '';
                return this.districts_data[(this.counties_selected) - 1];
            }
        }
    },
    data:function(){
        return {
            districts_selected: this.districts_data,
            districts:[]
        }
    }
}
</script>>