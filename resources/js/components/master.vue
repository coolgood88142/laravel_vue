<template>
    <select v-model="masterValue">
        <option v-for="(data, index) in masterArray" :key="index" :value="index">{{ index }}</option>
    </select>
    <select v-model="subValue">
        <option v-for="(data, index) in subArray" :key="index" :value="data">{{ index }}</option>
    </select>
</template>

<script>
export default {
    props:{
        masterArray:{
            type:Array
        }
    },
    conputed(){
        subArray:{
            return this.masterArray[this.masterValue]
        }
    },
    data:function(){
        return {
            masterValue: 'master1',
            subValue:''
        }
    }
}
</script>