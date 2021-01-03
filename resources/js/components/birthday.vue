<template>
	<div class="form-group">
		<h3 class="text-black font-weight-bold">生日</h3>
		<div class="form-check form-check-inline">
			<select v-model="userYear" id="us_year" name="us_year"
				:class="yearSelectClass" v-on:change="clearOptions">
				<option value="0" disabled selected>--請選擇--</option>
				<!--下拉選單不要拿index當value-->
				<option v-for="(year, index) in years" :key="index"
					:value="year.value">{{ year.value }}</option>
			</select>
			<label class="form-check-label">年</label>
		</div>
		<div class="form-check form-check-inline">
			<select v-model="userMonth" id="us_month" name="us_month"
				:class="monthSelectClass" v-on:change="onChange">
				<option value="0" disabled selected>--請選擇--</option>
				<option v-for="(month, index) in months" :key="index"
					:value="month.value">{{ month.value }}</option>
			</select>
			<label class="form-check-label">月</label>
		</div>
		<div class="form-check form-check-inline">
			<select v-model="userDay" id="us_day" name="us_day" :class="daySelectClass">
				<option value="0" disabled selected>--請選擇--</option>
				<option v-for="(day, index) in days" :key="index" :value="day">{{ day }}</option>
			</select>
			<label class="form-check-label">日</label>
		</div>
		<small v-if="isShow" id="warning" :class="smallClass">
			{{ isRemind ? remindText : warningText }}
		</small>
	</div>
</template>

<script>
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

import verification from "./mixins/verification.js";

export default {
	mixins: [verification],
	props: {
		yearsSelected: {
			type: Number,
		},
		monthsSelected: {
			type: Number,
		},
		daysSelected: {
			type: Number,
		},
	},
	data() {
		return {
			years: DefaultDateData(beginYear, endYear),
			months: DefaultDateData(beginMonth, endMonth),
			days: "",
			warningText: "生日必填",
			remindText: "生日填寫不完整",
			birthdayError: false,
			isYearError: true,
			isMonthError: true,
			isDayError: true,
			isRemind: false,
			isShow: false,
			yearSelectClass: this.getSelectClass(),
			monthSelectClass: this.getSelectClass(),
			daySelectClass: this.getSelectClass(),
			smallClass: this.getTextClass(),
			userYear: this.yearsSelected,
			userMonth: this.monthsSelected,
			userDay: this.daysSelected,
		}
	},
	mounted() {
		this.getDays(this.userYear, this.userMonth)
	},
	methods: {
		clearOptions() {
			this.userMonth = 0
			this.days = ""
			this.userDay = 0
		},
		onChange() {
			this.userDay = 0
			if (this.userYear !== 0) {
				this.getDays(this.userYear, this.userMonth)
			}
		},
		getDays(year, month) {
			if (year !== "" && month !== "") {
				this.days = new Date(year, month, 0).getDate()
			}
		},
		isBirthdayError() {
			if (!this.isYearError && !this.isMonthError && !this.isDayError) {
				this.birthdayError = false
				this.isRemind = false
				this.isShow = false
			} else {
				this.birthdayError = false
				this.isRemind = true
				this.isShow = true

				if (this.isYearError && this.isMonthError && this.isDayError) {
					this.birthdayError = true
					this.isRemind = false
					this.isShow = true
				}
			}
		},
		getBirthdayIsError() {
			this.isYearError = this.isValueNullOrEmpty(this.userYear)
			this.isMonthError = this.isValueNullOrEmpty(this.userMonth)
			this.isDayError = this.isValueNullOrEmpty(this.userDay)
			this.isBirthdayError()

			this.yearSelectClass = this.setElementClass(this.isYearError, "select", this.isRemind)
			this.monthSelectClass = this.setElementClass(this.isMonthError, "select", this.isRemind)
			this.daySelectClass = this.setElementClass(this.isDayError, "select", this.isRemind)
			this.smallClass = this.setElementClass(this.birthdayError, "text", this.isRemind)

			return this.birthdayError
		},
		getBirthdayValue() {
			return new Date(this.userYear, this.userMonth, this.userDay).toISOString().substring(0, 10)
		},
	},
	watch: {
		userYear() {
			this.getBirthdayIsError()
		},
		userMonth() {
			this.getBirthdayIsError()
		},
		userDay() {
			this.getBirthdayIsError()
		},
	},
}
</script>
