<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">生日</h3>
        <div class="form-check form-check-inline">
            <select v-model="years_selected" id="year" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :value="index">@{{ year.value }}</option>
            </select>
            <label>年</label>
        </div>
        <div class="form-check form-check-inline">
            <select v-model="months_selected" id="month" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :value="index">@{{ month.value }}</option>
             </select>
             <label>月</label>
         </div>
         <div class="form-check form-check-inline">
             <select v-model="days_selected" id="day">
                 <option value="" disabled selected>--請選擇--</option>
                 <option v-for="day in days" :value="day">@{{ day }}</option>
            </select>
            <label>日</label>
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
    }
}
</script>