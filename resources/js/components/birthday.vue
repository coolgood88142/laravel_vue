<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="yearsSelected" id="us_year" :class="selectClass" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="monthsSelected" id="us_month" :class="selectClass" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="daysSelected" id="us_day" :class="selectClass">
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
        select_class: {
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
            isError: true,
            isRemind: false,
            selectClass: this.getSelectClass(),
            smallClass: this.getTextClass()


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
                this.isError = false
                this.isRemind = false
            }else{
                if (year == '' && month == '' && day == ''){
                    this.isError= true
                    this.isRemind = false
                }else{
                    this.isError= false
                    this.isRemind = true
                }
            }
        }
    },
    watch:{
        yearsSelected(newVal){
            this.getBirthdayIsError(newVal, this.monthsSelected, this.daysSelected)
        },
        monthsSelected(newVal){
            this.getBirthdayIsError(this.yearsSelected, newVal, this.daysSelected)
        },
        daysSelected(newVal){
            this.getBirthdayIsError(this.yearsSelected, this.monthsSelected, newVal)
        },
        select_class(newVal){
            this.selectClass = newVal
        },
        small_class(newVal){
            this.smallClass = newVal
        }
    }
}
</script>