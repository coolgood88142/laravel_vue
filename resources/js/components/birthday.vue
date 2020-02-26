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
        <small id="warning" :class="smallClass">{{ incomplete ? remindText : warningText }}</small>
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
    props: {
        year_select_class: {
            type:String
        },
        month_select_class: {
            type:String
        },
        day_select_class: {
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
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            yearsSelected:'',
            monthsSelected: '',
            daysSelected: '',
            warningText: '生日必填',
            remindText:'生日填寫不完整',
            isYearError: true,
            isMonthError: true,
            isDayError: true,
            isRemind: false,
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
        getBirthdayIsError:function(year, month, day){
            if (year != '' && month != '' && day != ''){
                this.isRemind = false
            }else{
                if (year == '' && month == '' && day == ''){
                    this.isRemind = false
                }else{
                    this.isRemind = true
                }
            }
        }
    },
    watch:{
        yearsSelected(newVal){
            this.isYearError = this.isValueNullOrEmpty(newVal)
            this.getBirthdayIsError(newVal, this.monthsSelected, this.daysSelected)
        },
        monthsSelected(newVal){
            this.isMonthError = this.isValueNullOrEmpty(newVal)
            this.getBirthdayIsError(this.yearsSelected, newVal, this.daysSelected)
        },
        daysSelected(newVal){
            this.isDayError = this.isValueNullOrEmpty(newVal)
            this.getBirthdayIsError(this.yearsSelected, this.monthsSelected, newVal)
        },
        year_select_class(newVal){
            this.yearSelectClass = newVal
        },
        month_select_class(newVal){
            this.monthSelectClass = newVal
        },
        day_select_class(newVal){
            this.daySelectClass = newVal
        },
        small_class(newVal){
            this.smallClass = newVal
        }
    }
}
</script>