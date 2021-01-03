<template>
	<select v-model="districtsValue" id="us_districts" name="us_districts"
		:class="selectClass" @change="$emit('change-districts', districtsValue)">
		<option value="0" disabled selected>--請選擇--</option>
		<option v-for="(districts, index) in districtsArray" :key="index"
			:value="districts.value">{{ districts.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		countiesSelectedText: {
			type: String,
		},
		selectClass: {
			type: String,
		},
		districtsData: {
			type: Object,
		},
		districtsSelected: {
			type: Number,
		},
	},
	computed: {
		districtsArray() {
			if (this.countiesSelectedText !== "" ) {
				return this.districtsData[this.countiesSelectedText];
			}
		},
	},
	data() {
		return {
			districts: [],
			districtsValue: this.districtsSelected,
			districtsText: "",
		}
	},
	watch: {
		districtsValue(newVal) {
			this.districtsText = this.districtsArray[newVal]
		},
	},
}
</script>
