
<template>
    <div class="form-group">
        <h3 :class="[isError ? errorColor : textColor]">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select v-on:change-counties="updateDistricts"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
        </div>
        <div class="form-check form-check-inline">
            <input type="email" class="form-control" id="us_address" v-model="addressValue" placeholder="請選擇縣市與鄉鎮市區">
        </div>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';

export default {
    data:function(){
        return {
            addressText: '地址',
            countiesSelected: NaN,
            districtsSelected: '',
            addressValue: '',
            isError:false,
            errorColor: 'text-danger font-weight-bold',
            textColor: 'text-black font-weight-bold'
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
        addressValue(newValue){
            if(newValue ==  ''){
                this.isError = true
            }else{
                this.isError = false
            }
        }
    }
}
</script>>