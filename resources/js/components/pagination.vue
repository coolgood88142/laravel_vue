<template>
	<nav>
		<ul class="pagination">
			<li class="page-item" v-if="paginationData.current_page > 1">
				<a class="page-link" href="#" aria-label="Previous"
					v-on:click="changePage(paginationData.current_page - 1)">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li class="page-item" v-for="(page, index) in pagesNumber"
				:key="index" :class="[ page == isActived ? 'active' : '']">
				<a class="page-link" href="#" v-on:click="changePage(page)">{{ page }}</a>
			</li>
			<li class="page-item" v-if="paginationData.current_page < paginationData.last_page">
				<a class="page-link" href="#" aria-label="Next"
					v-on:click="changePage(paginationData.current_page + 1)">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	props: {
		paginationData: {
			type: Object,
		},
	},
	data() {
		return {
			offset: 4,
		}
	},
	computed: {
		isActived() {
			return this.paginationData.current_page
		},
		pagesNumber() {
			if (!this.paginationData.to) {
				return []
			}
			let from = this.paginationData.current_page - this.offset
			if (from < 1) {
				from = 1
			}
			let to = from + (this.offset * 2)
			if (to >= this.paginationData.last_page) {
				to = this.paginationData.last_page
			}
			const pagesArray = []
			while (from <= to) {
				pagesArray.push(from)
				from += 1
			}
			return pagesArray
		},
	},
	methods: {
		changePage(page) {
			this.$emit("change-pagination", page)
		},
	},
}

</script>
