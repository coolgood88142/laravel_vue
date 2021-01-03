<template>
	<select v-model="subValue">
		<option v-for="(data, index) in subArray" :key="index" :value="data">{{ index }}</option>
	</select>
</template>

<script>
export default {
	props: {
		masterArray: {
			type: Array,
		},
		masterSelected: {
			type: String,
		},
	},
	computed: {
		subArray() {
			return this.masterArray[this.masterSelected]
		},
	},
	data() {
		return {
			districts: [],
			districtsValue: this.districtsSelected,
			districtsText: "",
		}
	},
}
</script>
