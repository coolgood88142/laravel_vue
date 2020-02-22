<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="years_selected" id="us_year" :class="select_class" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="months_selected" id="us_month" :class="select_class" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="days_selected" id="us_day" :class="select_class">
                 <option value="" disabled selected>--請選擇--</option>
                 <option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
            </select>
            <label class="form-check-label">日</label>
        </div>
        <small id="warning" :class="small_class">{{ incomplete ? remindText : warningText }}</small>
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
    mixins: [classdata],
    data:function(){
        return {
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            years_selected:'',
            months_selected: '',
            days_selected: '',
            selectValue:{
                years: this.years_selected,
                months: this.months_selected,
                days: this.days_selected,
            },
            warningText: '生日必填',
            remindText:'生日填寫不完整'

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
            this.months_selected = ''
            this.days = ''
            this.days_selected = ''
        },
        onChange: function () {
            this.days_selected = ''
            if (this.years_selected  != ''){
                let year = this.years[this.years_selected].value;
                let month = this.months[this.months_selected].value;
                this.days = new Date(year, month, 0).getDate()
            }
        },
        getBirthdayIsError:function(year, month, day){
            let errorData = {}
            if (year != '' && month != '' && day != ''){
                errorData.isError = false
                errorData.isRemind = false
            }else{
                if (year == '' && month == '' && day == ''){
                    errorData.isError= true
                    errorData.isRemind = false
                }else{
                    errorData.isError= false
                    errorData.isRemind = true
                }
            }

            return errorData
        }
    },
    watch:{
        years_selected(newVal){
            this.selectValue = {
                years: newVal,
                months: this.months_selected,
                days: this.days_selected,
            }

            this.$emit('select-value', this.selectValue);
        },
        months_selected(newVal){
            this.selectValue = {
                years: this.years_selected,
                months: newVal,
                days: this.days_selected,
            }

            this.$emit('select-value', this.selectValue);
        },
        days_selected(newVal){
            this.selectValue = {
                years: this.years_selected,
                months: this.months_selected,
                days: newVal,
            }

            this.$emit('select-value', this.selectValue);
        },
    }
}
</script>