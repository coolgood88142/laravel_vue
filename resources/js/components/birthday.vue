<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="years_selected" id="us_year" :class="[isYearError ? errorSelect : selectStyle]" v-on:change="clearOptions">
                <option value="*" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="months_selected" id="us_month" :class="[isMonthError ? errorSelect : selectStyle]" v-on:change="onChange">
                <option value="*" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="days_selected" id="us_day" :class="[isDayError ? errorSelect : selectStyle]">
                 <option value="*" disabled selected>--請選擇--</option>
                 <option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
            </select>
            <label class="form-check-label">日</label>
        </div>
        <small id="warning" :class="[birthday_error ? errorText : smallText]">{{ birthday_warning ?  notSelectedText : warningText }}</small>
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

export default {
    props: {
        birthday_error:{
            type:Boolean
        },
        birthday_warning:{
            type:Boolean
        }
    },
    data:function(){
        return {
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            years_selected: '*',
            months_selected: '*',
            days_selected: '*',
            isYearError: true,
            isMonthError: true,
            isDayError: true,
            warningText: '生日必填',
            notSelectedText:'生日填寫不完整',
            errorSelect: 'text-danger custom-select',
            selectStyle: 'custom-select',
            errorText: 'form-text text-danger',
            remindText: 'form-text text-black',
            smallText: 'form-text d-none'
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