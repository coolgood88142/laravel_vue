<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="years_selected" id="us_year" :class="selectClass" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="months_selected" id="us_month" :class="selectClass" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="days_selected" id="us_day" :class="selectClass">
                 <option value="" disabled selected>--請選擇--</option>
                 <option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
            </select>
            <label class="form-check-label">日</label>
        </div>
        <small id="warning" :class="[birthdayError ? (birthday_incomplete ? remindTextStyle : errorTextStyle) : smallClass]">{{ birthday_incomplete ? remindText : warningText }}</small>
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

import classdata from './mixins/class.js';

export default {
    mixins: [classdata],
    data:function(){
        return {
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            years_selected: '*',
            months_selected: '*',
            days_selected: '*',
            birthdayError:true,
            birthday_incomplete: true,
            warningText: '生日必填',
            remindText:'生日填寫不完整',
            selectClass: 'custom-select',
            errorTextStyle: this.getTextClass().error,
            remindTextStyle: this.getTextClass().remind,
            smallClass: 'form-text'

            // let us_year = document.getElementById("us_year");
            // let us_month = document.getElementById("us_month");
            // let us_day = document.getElementById("us_day");
            // let year_val = us_year.options[us_year.selectedIndex].value;
            // let month_val = us_month.options[us_month.selectedIndex].value;
            // let day_val = us_day.options[us_day.selectedIndex].value;
            
            // if (year_val != '*' && month_val != '*' && day_val != '*'){
            //     this.birthdayStyle.Error = false
            //     this.birthdayStyle.Incomplete = true
            // }else{
            //     this.birthdayStyle.Error = true
            //     if (year_val == '*' && month_val == '*' && day_val == '*'){
            //         this.birthdayStyle.Incomplete = false
            //     }else{
            //         this.birthdayStyle.Incomplete = true
            //     }
            // }
        }
    },
    methods: {
        clearOptions: function () {
            this.months_selected = '*'
            this.days = ''
            this.days_selected = '*'
        },
        onChange: function () {
            this.days_selected = '*'
            if (this.years_selected  != '*'){
                let year = this.years[this.years_selected].value;
                let month = this.months[this.months_selected].value;
                this.days = new Date(year, month, 0).getDate()
            }
        },
        getBirthdayIsError:function(){
            if (this.years_selected != '*' && this.months_selected != '*' && this.days_selected != '*'){
                this.birthdayError = false
            }else{
                this.birthdayError = true
                if (this.years_selected == '*' && this.months_selected == '*' && this.days_selected == '*'){

                }else{

                }
            }
            return this.birthdayError
        }
    },
    watch:{
        years_selected(newSelected){
            if(newSelected == '*'){
                this.isYearError = true
            }else{
                this.isYearError = false
            }
        },
        months_selected(newSelected){
            if(newSelected == '*' ){
                this.isMonthError = true
            }else{
                this.isMonthError = false
            }
        },
        days_selected(newSelected){
            if(newSelected == '*'){
                this.isDayError = true
            }else{
                this.isDayError = false
            }
        }
    }
}
</script>