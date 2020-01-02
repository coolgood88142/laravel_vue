<template>
    <select v-model="districts_selected" id="districts" class="form-control">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(districts, index) in districts_array" :key="districts.value" :value="index">{{ districts.text }}</option>
    </select>
</template>

<script>
export default {
    data:function(){
        return {
            districts_array: [],
            districts_selected: ''
        }
    },
    methods: {
        // ShowText(){
        //     let data = [this.districts_array, this.districts_selected];
        //     bus.$emit('DistrictsDate', data);
        // }
    }
}
</script>>