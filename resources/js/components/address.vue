
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
        <small id="warning" :class="[address_error ? (address_incomplete ? remindTextStyle : errorTextStyle) : smallText]">{{ address_incomplete ? remindText : warningText }}</small>
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
            address_error: false,
            address_incomplete: true,
            warningText: '地址必填',
            remindText:'地址填寫不完整',
            errorColor: 'form-control border border-danger',
            borderColor: 'form-control border',
            errorTextStyle: 'form-text text-danger',
            remindTextStyle: 'form-text text-secondary',
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

        // let counties = document.getElementById("counties");
        //     let districts = document.getElementById("districts");
        //     let us_address = document.getElementById("us_address");
        //     let counties_val = counties.options[counties.selectedIndex].value;
        //     let districts_val = districts.options[districts.selectedIndex].value;

        //     if (counties_val != '' && districts_val != '' && us_address.value != '') {
        //         this.addressStyle.Error = false
        //         this.addressStyle.Incomplete = true
        //     } else {
        //         this.addressStyle.Error = true
        //         if (counties_val == '' && districts_val == '' && us_address.value == '') {
        //             this.addressStyle.Incomplete = false
        //         } else {
        //             this.addressStyle.Incomplete = true
        //         }
        //     }
    },
    watch:{
        countiesSelected(newValue){
            this.emit('change-counties', newValue)
        },
        districtsSelected(newValue){
            this.emit('change-districts', newValue)
        }
    }
}
</script>