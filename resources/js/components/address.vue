
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties_select v-on:change-counties="updateDistricts" :select_class="countiesSelectClass"></counties_select>
        </div>
        <div class="form-check form-check-inline">
            <districts_select v-on:change-districts="getDistrictsSelected" :select_class="districtsSelectClass" :counties_selected="countiesSelected"></districts_select>
        </div>
        <div class="form-check form-check-inline">
            <input type="text" :class="inputClass" id="us_road" name="us_road" v-model="roadValue" placeholder="請選擇縣市與鄉鎮市區">
        </div>
        <small id="warning" :class="smallClass">{{ isRemind ? remindText : warningText }}</small>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    data:function(){
        return {
            addressText: '地址',
            countiesSelected: 0,
            districtsSelected: '',
            roadValue:'',
            warningText: '地址必填',
            remindText:'地址填寫不完整',
            addressError: false,
            isCountiesError: true,
            isDistrictsError: true,
            isRoadValueError: true,
            isRemind: false,
            countiesSelectClass: this.getSelectClass(),
            districtsSelectClass: this.getSelectClass(),
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
        isRemindError: function(){
            if (this.countiesSelected != '' && this.districtsSelected != '' && this.roadValue != ''){
                this.isRemind = false
            }else{
                if (this.countiesSelected == '' && this.districtsSelected == '' && this.roadValue == ''){
                    this.isRemind = false
                }else{
                    this.isRemind = true
                }
            }

            return this.isRemind
        },
        getAddressIsError: function(){
            let isRemindError = this.isRemindError()
            this.isCountiesError = this.isValueNullOrEmpty(this.countiesSelected)
            this.isDistrictsError = this.isValueNullOrEmpty(this.districtsSelected)
            this.isRoadValueError = this.isValueNullOrEmpty(this.roadValue)

            let addressError = (this.isCountiesError && this.isDistrictsError && this.isRoadValueError) ? true : false
            this.countiesSelectClass = this.setElementClass(this.isCountiesError, "select", isRemindError)
            this.districtsSelectClass = this.setElementClass(this.isDistrictsError, "select", isRemindError)
            this.inputClass = this.setElementClass(this.isRoadValueError, "input", isRemindError)
            this.smallClass = this.setElementClass(addressError, "text", isRemindError)

            return addressError
        }
    },
    watch:{
        countiesSelected(newVal){
            this.districtsSelected = ''
            this.getAddressIsError()
        },
        districtsSelected(newVal){
            this.getAddressIsError()
        },
        roadValue(newVal){
            this.getAddressIsError()
        }
    }
}
</script>