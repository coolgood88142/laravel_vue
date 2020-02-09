<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="years_selected" id="year" :class="[isYearError ? errorColor : selectStyle]" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :key="index" :value="index">{{ year.value }}</option>
            </select>
            <label class="form-check-label">年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="months_selected" id="month" :class="[isMonthError ? errorColor : selectStyle]" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :key="index" :value="index">{{ month.value }}</option>
             </select>
             <label class="form-check-label">月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="days_selected" id="day" :class="[isDayError ? errorColor : selectStyle]">
                 <option value="" disabled selected>--請選擇--</option>
                 <option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
            </select>
            <label class="form-check-label">日</label>
          </div>
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
    data:function(){
        return {
            years: DefaultDateData(begin_year, end_year),
            months: DefaultDateData(begin_month, end_month),
            days: '',
            years_selected: '',
            months_selected: '',
            days_selected: '',
            isYearError: false,
            isMonthError: false,
            isDayError: false,
            errorColor: 'text-danger custom-select',
            selectStyle: 'custom-select'
        }
    },
    methods: {
        clearOptions: function () {
            this.months_selected = '';
            this.days = '';
            this.days_selected = '';
        },
        onChange: function () {
            this.days_selected = '';
            let year = this.years[this.years_selected].value;
            let month = this.months[this.months_selected].value;
            this.days = new Date(year, month, 0).getDate()
        }
    },
    watch:{
        years_selected(newValue){
            if(newValue == ''){
                this.isYearError = true
            }else{
                this.isYearError = false
            }
        },
        months_selected(newValue){
            if(newValue == ''){
                this.isMonthError = true
            }else{
                this.isMonthError = false
            }
        },
        days_selected(newValue){
            if(newValue == ''){
                this.isDayError = true
            }else{
                this.isDayError = false
            }
        }
    }
}
</script>