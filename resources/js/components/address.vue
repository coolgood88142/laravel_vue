
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select v-on:change-counties="updateDistricts"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
        </div>
        <div class="form-check form-check-inline">
            <input type="email" :class="[address_error ? errorColor : borderColor]" id="us_address" placeholder="請選擇縣市與鄉鎮市區">
        </div>
        <small id="warning" :class="[address_error ? errorText : smallText]">{{ warningText }}</small>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';

export default {
    props: {
        address_error:{
            type:Boolean
        }
    },
    data:function(){
        return {
            addressText: '地址',
            countiesSelected: NaN,
            districtsSelected: '',
            warningText: '地址必填',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorText: 'form-text text-danger',
            smallText: 'form-text d-none'
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
    },
    watch: {
        address_error(isError){
            if(isError){
                this.address_error = true
            }else{
                this.address_error = false
            }
        }
    }
}
</script>>