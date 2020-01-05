<template>
    <select id="districts" class="form-control">
        <option value="" disabled selected>--請選擇--</option>
        <option v-for="(districts, index) in districts_array" :key="index" :value="districts.value">{{ districts.text }}</option>
    </select>
</template>

<script>
export default {
    props: {
        districts_array:{
            type:Array,
            required:true
        }
        // districts_selected:{
        //     type:String
        // }
    }
}
</script>>