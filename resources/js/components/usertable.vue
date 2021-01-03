<template>
	<div>
		<table id="example" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>姓名</th>
					<th>信箱</th>
					<th>狀態</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in items" :key="index">
					<td>{{ item.us_id }}</td>
					<td>{{ item.us_name }}</td>
					<td>{{ item.us_email }}</td>
					<td>{{ (item.us_status == 1 ? "正常" : "停用")  }}</td>
				</tr>
			</tbody>
		</table>

		<nav>
			<ul class="pagination">
				<li v-if="pagination.current_page > 1">
					<a href="#" aria-label="Previous"
						v-on:click="changePage(pagination.current_page - 1)">
						<span aria-hidden="true">上一頁</span>
					</a>
				</li>
				<li v-for="(page, index) in pagesNumber" :key=index
					:class="[ page == isActived ? 'active' : '']">
					<a href="#" v-on:click="changePage(page)">{{ page }}</a>
				</li>
				<li v-if="pagination.current_page < pagination.last_page">
					<a href="#" aria-label="Next"
						v-on:click="changePage(pagination.current_page + 1)">
						<span aria-hidden="true">下一頁</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</template>

<script>
import verification from "./mixins/verification.js";

export default {
	mixins: [verification],
	props: ["items"],
	data() {
		return {
			pagination: {
				total: 0,
				per_page: 2,
				from: 1,
				to: 0,
				current_page: 1,
			},
			offset: 4,
		}
	},
	computed:{
		isActived() {
			return this.pagination.current_page
		},
		pagesNumber() {
			if (!this.pagination.to) {
				return []
			}
			let from = this.pagination.current_page - this.offset;
			if (from < 1) {
				from = 1
			}
			let to = from + (this.offset * 2)
			if (to >= this.pagination.last_page) {
				to = this.pagination.last_page
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
		getUserData(page) {
			this.$http.get(`/select?page=${page}`).then((response) => {
				this.$set("items", response.data.data)
				this.$set("pagination", response.data.pagination)
			})
		},
		changePage(page) {
			this.pagination.current_page = page
			this.getUserData(page)
		},
	},
}
</script>
