import "bootstrap/dist/css/bootstrap.css"
import swal from "sweetalert"
import pagination_vav from "./components/pagination.vue"

let user = new Vue({
	el: "#app",
	data: {
		users: [],
		checkedUsers: [],
		pagination: {},
		getPage: 1,
	},
	components: {
		"pagination-vav": pagination_vav,
	},
	mounted() {
		this.getUserData(1)
	},
	methods: {
		getPagination(getPage) {
			this.getUserData(getPage)
		},
		getUserData(page) {
			axios.get("/getUserData?page=" + page).then((response) => {
				this.users = response.data.users.data,
				this.pagination = response.data.pagination
			}).catch((error) => {
				if (error.response) {
					console.log(error.response.data)
					console.log(error.response.status)
					console.log(error.response.headers)
				} else {
					console.log("Error", error.message)
				}
			})
		},
		editUserData(id) {
			window.location.href = `/editUserData?id=${id}`
		},
		deleteUserData() {
			axios.post("/deleteUserData", {
				id: this.checkedUsers,
			}).then((response) => {
				if (response.data.status === "success") {
					swal({
						title: response.data.message,
						confirmButtonColor: "#e6b930",
						icon: response.data.status,
						showCloseButton: true,
					}).then(() => {
						window.location = response.data.url
					})
				}
			}).catch((error) => {
				if (error.response) {
					console.log(error.response.data)
					console.log(error.response.status)
					console.log(error.response.headers)
				} else {
					console.log("Error", error.message)
				}
			})
		},
	},
})