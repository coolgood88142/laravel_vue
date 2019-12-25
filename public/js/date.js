webpackJsonp([2],{

/***/ "./resources/js/date.js":
/***/ (function(module, exports) {

var begin_year = 1900;
var end_year = 2020;

var begin_month = 1;
var end_month = 12;

function DefaultDateData(begin, end) {
    var date_array = [];
    for (var i = begin; i < end; i++) {
        date_array.push({ text: i });
    }

    return date_array;
}

var app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        years: DefaultDateData(begin_year, end_year),
        months: DefaultDateData(begin_month, end_month + 1),
        days: '',
        years_selected: '',
        months_selected: '',
        days_selected: ''
    },
    methods: {
        clearOptions: function clearOptions() {
            this.months_selected = '';
            this.days = '';
            this.days_selected = '';
        },
        onChange: function onChange() {
            this.days_selected = '';
            var year = this.years[this.years_selected].text;
            var month = this.months[this.months_selected].text;

            this.days = new Date(year, month, 0).getDate();
        }
    }
});

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/date.js");


/***/ })

},[1]);