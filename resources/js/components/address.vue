
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select :class="[isError ? errorColor : '']" v-on:change-counties="updateDistricts"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select :class="[isError ? errorColor : '']" v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
        </div>
     </div>
</template>

<script>
import counties from './components/counties.vue';
import districts from './components/districts.vue';

export default {
    data:function(){
        return {
            addressText: '地址',
            isError: false,
            errorColor: 'text-danger'
        }
    },
    components:{
        'counties_select': counties,
        'districts_select': districts
    },
    methods: {
        getDistrictsSelected(DistrictsSelected) {
            this.districtsSelected = DistrictsSelected;
        },
        updateDistricts(CountiesSelected) {
            this.countiesSelected = CountiesSelected;
        }
    }
}
</script>>