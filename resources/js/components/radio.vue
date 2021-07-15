<template>
	<feedRadio :feed-data="feeddData" :feed-index="index"
		:card-selected="cardSelected" v-on:save-card="saveCard"></feedRadio>
    
    
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
	components: {
		"feedRadio": feedRadio,
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
