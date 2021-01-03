const beginYear = 1900
const endYear = 2020

const beginMonth = 1
const endMonth = 12

function DefaultDateData(begin, end) {
	const dateArray = []
	for (let i = begin; i < end + 1; i += 1) {
		dateArray.push({ value: i })
	}

	return dateArray
}

const app = new Vue({
	el: "#app",
	data: {
		message: "Vue練習:",
		years: DefaultDateData(beginYear, endYear),
		months: DefaultDateData(beginMonth, endMonth),
		days: "",
		years_selected: "",
		months_selected: "",
		daysq: "顯示日期!",
	},
	methods: {
		clearOptions() {
			this.months_selected = ""
			this.days = ""
			this.days_selected = ""
		},
		onChange() {
			this.days_selected = ""
			if (this.years_selected !== "") {
				const year = this.years[this.years_selected].value
				const month = this.months[this.months_selected].value
				this.days = new Date(year, month, 0).getDate()
			} else {
				alert("請先選擇年份!")
			}
		},
		showDate() {
			const year = this.years[this.years_selected].value
			const month = this.months[this.months_selected].value
			alert(`${year}年${month}月${this.days_selected}日`)
		},
	},
})
