<template>
		<div class="form-group">
			<h3 class="text-black font-weight-bold">地址</h3>
			<div class="form-check form-check-inline">
					<counties v-on:change-counties="updateDistricts" :select-class="countiesSelectClass"
						:counties-data="countiesData" :counties-selected="userCounties"></counties>
			</div>
			<div class="form-check form-check-inline">
					<districts v-on:change-districts="getDistrictsSelected"
						:select-class="districtsSelectClass" :counties-selected-text="countiesSelectedText"
						:districts-data="districtsData" :districts-selected="userDistricts"></districts>
			</div>
			<div class="form-check form-check-inline">
					<input type="text" :class="inputClass" id="us_road" name="us_road"
						v-model="userRoad" placeholder="請選擇縣市與鄉鎮市區">
			</div>
			<small v-if="isShow" id="warning" :class="smallClass">
					{{ isRemind ? remindText : warningText }}
			</small>
		</div>
</template>

<script>
import counties from "./counties.vue"
import districts from "./districts.vue"
import verification from "./mixins/verification.js"

export default {
	mixins: [verification],
	props: {
		countiesSelected: {
			type: Number,
		},
		districtsSelected: {
			type: Number,
		},
		roadValue: {
			type: String,
		},
		countiesData: {
			type: Array,
		},
		districtsData: {
			type: Object,
		},
	},
	data() {
		return {
			addressText: "地址",
			countiesSelectedText: "",
			warningText: "地址必填",
			remindText: "地址填寫不完整",
			addressError: false,
			isCountiesError: true,
			isDistrictsError: true,
			isRoadValueError: true,
			isRemind: false,
			isShow: false,
			countiesSelectClass: this.getSelectClass(),
			districtsSelectClass: this.getSelectClass(),
			inputClass: this.getInputClass(),
			smallClass: this.getTextClass(),
			userCounties: this.countiesSelected,
			userDistricts: this.districtsSelected,
			userRoad: this.roadValue,
		}
	},
	components: {
		"counties": counties,
		"districts": districts
	},
	mounted() {
		this.countiesSelectedText = this.countiesData[this.userCounties]["text"]
	},
	methods: {
		getDistrictsSelected(DistrictsSelected) {
			this.userDistricts = DistrictsSelected
		},
		updateDistricts(CountiesSelected) {
			this.countiesSelectedText = this.countiesData[CountiesSelected]["text"]
			this.userCounties = CountiesSelected
			this.userDistricts = ""
		},
		isAddressError() {
			if (!this.isCountiesError && !this.isDistrictsError && !this.isRoadValueError) {
				this.addressError = false
				this.isRemind = false
				this.isShow = false
			} else {
				this.addressError = false
				this.isRemind = true
				this.isShow = true

				if (this.isCountiesError && this.isDistrictsError && this.isRoadValueError) {
					this.addressError = true
					this.isRemind = false
					this.isShow = true
				}
			}
		},
		getAddressIsError() {
			this.isCountiesError = this.isValueNullOrEmpty(this.userCounties)
			this.isDistrictsError = this.isValueNullOrEmpty(this.userDistricts)
			this.isRoadValueError = this.isValueNullOrEmpty(this.userRoad)
			this.isAddressError()

			this.countiesSelectClass = this.setElementClass(this.isCountiesError, "select", this.isRemind)
			this.districtsSelectClass = this.setElementClass(this.isDistrictsError, "select", this.isRemind)
			this.inputClass = this.setElementClass(this.isRoadValueError, "input", this.isRemind)
			this.smallClass = this.setElementClass(this.addressError, "text", this.isRemind)

			return this.addressError
		},
		getCountiesValue() {
			return this.countiesSelectedText
		},
		getDistrictsValue() {
			let userDistrictsData = ""
			const districtsValue = this.userDistricts
			const districtsArray = this.districtsData[this.countiesSelectedText]
			districtsArray.forEach((el) => {
				if (el.value === districtsValue) {
					userDistrictsData = el.text
				}
			})

			return userDistrictsData
		},
		getRoadValue() {
			return this.userRoad
		},
	},
	watch: {
		userCounties() {
			this.userDistricts = 0
			this.getAddressIsError()
		},
		userDistricts() {
			this.getAddressIsError()
		},
		userRoad() {
			this.getAddressIsError()
		},
	},
}
</script>
