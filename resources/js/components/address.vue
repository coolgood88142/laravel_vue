
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select v-on:change-counties="updateDistricts" :select_class="select_class"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select v-on:change-districts="getDistrictsSelected" :select_class="select_class" :counties_selected="countiesSelected"></districts_select>
        </div>
        <div class="form-check form-check-inline">
            <input type="email" :class="input_class" id="us_address" v-model="addressValue" placeholder="請選擇縣市與鄉鎮市區">
        </div>
        <small id="warning" :class="small_class">{{ incomplete ? remindText : warningText }}</small>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';
import classdata from './mixins/class.js';

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
    mixins: [classdata],
    data:function(){
        return {
            addressText: '地址',
            countiesSelected: NaN,
            districtsSelected: '',
            addressValue:'',
            selectValue:{
                counties: this.countiesSelected,
                districts: this.districtsSelected,
                address:this.addressValue
            },
            address_incomplete: true,
            warningText: '地址必填',
            remindText:'地址填寫不完整',
            selectClass: 'custom-select',
            errorColor: this.getInputClass(),
            borderColor: this.getInputClass(),
            errorTextStyle: this.getTextClass(),
            remindTextStyle: this.getTextClass(),
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
            let errorData = {}
            if (counties != '' && districts != '' && address != ''){
                errorData.isError = false
                errorData.isRemind = false
            }else{
                if (counties == '' && districts == '' && address == ''){
                    errorData.isError= true
                    errorData.isRemind = false
                }else{
                    errorData.isError= false
                    errorData.isRemind = true
                }
            }

            return errorData
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
            this.selectValue = {
                counties: newVal,
                districts: this.districtsSelected,
                address: this.addressValue
            }

            this.$emit('select-value', this.selectValue)
        },
        districtsSelected(newVal){
            this.selectValue = {
                counties: this.countiesSelected,
                districts: newVal,
                address: this.addressValue
            }

            this.$emit('select-value', this.selectValue)
        },
        addressValue(newVal){
            this.selectValue = {
                counties: this.countiesSelected,
                districts: this.districtsSelected,
                address: newVal
            }

            this.$emit('select-value', this.selectValue);
        }
    }
}
</script>