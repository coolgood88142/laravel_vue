
<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">地址</h3>
        <div class="form-check form-check-inline">
            <counties v-on:change-counties="updateDistricts" :select_class="countiesSelectClass" :counties_data="counties_data"></counties>
        </div>
        <div class="form-check form-check-inline">
            <districts v-on:change-districts="getDistrictsSelected" :select_class="districtsSelectClass" :counties_selected_text="countiesSelectedText" :districts_data="districts_data"></districts>
        </div>
        <div class="form-check form-check-inline">
            <input type="text" :class="inputClass" id="us_road" name="us_road" v-model="roadValue" placeholder="請選擇縣市與鄉鎮市區">
        </div>
        <small v-if="isShow" id="warning" :class="smallClass">{{ isRemind ? remindText : warningText }}</small>
    </div>
</template>

<script>
import counties from './counties.vue';
import districts from './districts.vue';
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    props:{
        countiesSelected:{
            type:Number
        },
        districtsSelected:{
            type:String
        },
        roadValue:{
            type:String
        },
        counties_data:{
            type:Array
        },
        districts_data:{
            type:Object
        }
    },
    data:function(){
        return {
            addressText: '地址',
            countiesSelectedText: '',
            warningText: '地址必填',
            remindText:'地址填寫不完整',
            addressError: false,
            isCountiesError: true,
            isDistrictsError: true,
            isRoadValueError: true,
            isRemind: false,
            isShow: false,
            countiesSelectClass: this.getSelectClass(),
            districtsSelectClass: this.getSelectClass(),
            inputClass: this.getInputClass(),
            smallClass: this.getTextClass()
        }
    },
    components:{
        'counties': counties,
        'districts': districts
    },
    methods: {
        getDistrictsSelected(DistrictsSelected) {
            this.districtsSelected = DistrictsSelected;
        },
        updateDistricts(CountiesSelected) {
            this.countiesSelected = CountiesSelected;
            this.countiesSelectedText = this.counties_data[CountiesSelected]['text'];
        },
        isAddressError: function(){
            if (!this.isCountiesError && !this.isDistrictsError && !this.isRoadValueError){
                this.addressError = false
                this.isRemind = false
                this.isShow = false
            }else{
                if (this.isCountiesError && this.isDistrictsError && this.isRoadValueError){
                    this.addressError = true
                    this.isRemind = false
                    this.isShow = true
                }else{
                    this.addressError = false
                    this.isRemind = true
                    this.isShow = true
                }
            }
        },
        getAddressIsError: function(){
            this.isCountiesError = this.isValueNullOrEmpty(this.countiesSelected)
            this.isDistrictsError = this.isValueNullOrEmpty(this.districtsSelected)
            this.isRoadValueError = this.isValueNullOrEmpty(this.roadValue)
            this.isAddressError()

            this.countiesSelectClass = this.setElementClass(this.isCountiesError, "select", this.isRemind)
            this.districtsSelectClass = this.setElementClass(this.isDistrictsError, "select", this.isRemind)
            this.inputClass = this.setElementClass(this.isRoadValueError, "input", this.isRemind)
            this.smallClass = this.setElementClass(this.addressError, "text", this.isRemind)

            return this.addressError
        }
    },
    watch:{
        //3個選單與文字框，改用function(isAddressError)，watch用一個object去處理(設定class)
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