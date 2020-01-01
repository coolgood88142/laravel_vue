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

let app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        years: DefaultDateData(begin_year, end_year),
        months: DefaultDateData(begin_month, end_month),
        days: '',
        years_selected: '',
        months_selected: '',
        days_selected: '',
        showText:'顯示日期!'
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
        // showDate: function(){
            
        // }
    }
})