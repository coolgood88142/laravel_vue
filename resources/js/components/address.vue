
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select v-on:change-counties="updateDistricts" :select_class="selectClass"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select v-on:change-districts="getDistrictsSelected" :select_class="selectClass" :counties_selected="countiesSelected"></districts_select>
        </div>
        <div class="form-check form-check-inline">
            <input type="email" :class="inputClass" id="us_address" v-model="addressValue" placeholder="請選擇縣市與鄉鎮市區">
        </div>
        <small id="warning" :class="smallClass">{{ incomplete ? remindText : warningText }}</small>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';
import verification from './mixins/verification.js';

export default {
    props: {
        select_class: {
            type:String
        },
        input_class: {
            type:String
        },
        small_class: {
            type:String
        },
        incomplete: {
            type:Boolean
        }
    },
    mixins: [verification],
    data:function(){
        return {
            addressText: '地址',
            countiesSelected: NaN,
            districtsSelected: '',
            addressValue:'',
            warningText: '地址必填',
            remindText:'地址填寫不完整',
            isError: true,
            isRemind: false,
            selectClass: this.getSelectClass(),
            inputClass: this.getInputClass(),
            smallClass: this.getTextClass()
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
        },
        getAddressIsError:function(counties, districts, address){
            if (counties != '' && districts != '' && address != ''){
                this.isError = false
                this.isRemind = false
            }else{
                if (counties == '' && districts == '' && address == ''){
                    this.isError= true
                    this.isRemind = false
                }else{
                    this.isError= false
                    this.isRemind = true
                }
            }
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
        countiesSelected(newVal){
            this.getAddressIsError(newVal, this.districtsSelected, this.addressValue)
        },
        districtsSelected(newVal){
            this.getAddressIsError(this.countiesSelected, newVal, this.addressValue)
        },
        addressValue(newVal){
            this.getAddressIsError(this.countiesSelected, this.districtsSelected, newVal)
        },
        select_class(newVal){
            this.selectClass = newVal
        },
        input_class(newVal){
            this.inputClass = newVal
        },
        small_class(newVal){
            this.smallClass = newVal
        }
    }
}
</script>