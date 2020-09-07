<template>
		<select v-model="countiesValue" id="us_counties" name="us_counties"
				:class="selectClass" @change="$emit('change-counties', countiesValue)">
				<option value="0" disabled selected>--請選擇--</option>
				<option v-for="(counties, index) in countiesArray" :key="index"
						:value="counties.value">{{ counties.text }}</option>
		</select>
</template>

<script>
export default {
	props: {
		selectClass: {
			type:String
		},
		countiesData: {
			type:Array
		},
		countiesSelected: {
			type:Number
		},
	},
	data() {
		return {
			countiesArray: this.countiesData,
			countiesValue: this.countiesSelected,
		}
	},
}
</script>
