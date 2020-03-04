<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="yearsSelected" id="us_year" name="us_year" :class="yearSelectClass" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="monthsSelected" id="us_month" name="us_month" :class="monthSelectClass" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="daysSelected" id="us_day" name="us_day" :class="daySelectClass">
                 <option value="" disabled selected>--請選擇--</option>
                 <option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
            </select>
            <label class="form-check-label">日</label>
        </div>
        <small v-if="isShow" id="warning" :class="smallClass">{{ isRemind ? remindText : warningText }}</small>
    </div>
</template>

<script>
let begin_year = 1900;
let end_year = 2020;

let begin_month = 1;
let end_month = 12;

function DefaultDateData(begin, end) {
    let date_array = [];
    for (let i = begin; i < end+1; i++) {
        date_array.push({ value: i });
    }

    return date_array;
}

import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    data:function(){
        return {
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            yearsSelected:'',
            monthsSelected: '',
            daysSelected: '',
            warningText: '生日必填',
            remindText:'生日填寫不完整',
            birthdayError: false,
            isYearError: true,
            isMonthError: true,
            isDayError: true,
            isRemind: false,
            isShow: false,
            yearSelectClass: this.getSelectClass(),
            monthSelectClass: this.getSelectClass(),
            daySelectClass: this.getSelectClass(),
            smallClass: this.getTextClass()
        }
    },
    methods: {
        clearOptions: function () {
            this.monthsSelected = ''
            this.days = ''
            this.daysSelected = ''
        },
        onChange: function () {
            this.daysSelected = ''
            if (this.yearsSelected  != ''){
                let year = this.years[this.yearsSelected].value;
                let month = this.months[this.monthsSelected].value;
                this.days = new Date(year, month, 0).getDate()
            }
        },
        isBirthdayError: function(){
            if (!this.isYearError && !this.isMonthError && !this.isDayError){
                this.birthdayError = false
                this.isRemind = false
                this.isShow = false
            }else{
                if (this.isYearError && this.isMonthError && this.isDayError){
                    this.birthdayError = true
                    this.isRemind = false
                    this.isShow = true
                }else{
                    this.birthdayError = false
                    this.isRemind = true
                    this.isShow = true
                }
            }
        },
        getBirthdayIsError: function(){
            this.isYearError = this.isValueNullOrEmpty(this.yearsSelected)
            this.isMonthError = this.isValueNullOrEmpty(this.monthsSelected)
            this.isDayError = this.isValueNullOrEmpty(this.daysSelected)
            this.isBirthdayError()

            this.yearSelectClass = this.setElementClass(this.isYearError, "select", this.isRemind)
            this.monthSelectClass = this.setElementClass(this.isMonthError, "select", this.isRemind)
            this.daySelectClass = this.setElementClass(this.isDayError, "select", this.isRemind)
            this.smallClass = this.setElementClass(this.birthdayError, "text", this.isRemind)
            
            return this.birthdayError
        }
    },
    watch:{
        yearsSelected(newVal){
            this.getBirthdayIsError()
        },
        monthsSelected(newVal){
            this.getBirthdayIsError()
        },
        daysSelected(newVal){
            this.getBirthdayIsError()
        }
    }
}
</script>