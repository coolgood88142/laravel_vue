import "bootstrap/dist/css/bootstrap.css"
import axios from "axios"
import swal from "sweetalert"
import name from "./components/name.vue"
import address from "./components/address.vue"
import birthday from "./components/birthday.vue"
import gender from "./components/gender.vue"
import email from "./components/email.vue"
import interest from "./components/interest.vue"
import usertable from "./components/usertable.vue"
import verification from "./components/mixins/verification.js"

let app = new Vue({
	el: "#app",
	mixins: [verification],
	data: {
		title: "填寫個人資料",
		btnStyle: "btn btn-primary",
		btnText: "送出",
	},
	components: {
		"name-textbox": name,
		"address-select": address,
		"birthday-select": birthday,
		"gender-radio": gender,
		"email-textbox": email,
		"interest-checkbox": interest,
		"usertable-table": usertable,
	},
	methods: {
		send(url) {
			const nameError = this.$refs.name.getNameIsError()
			const birthdayError = this.$refs.birthday.getBirthdayIsError()
			const addressError = this.$refs.address.getAddressIsError()
			const genderError = this.$refs.gender.getGenderIsError()
			const emailError = this.$refs.email.getEmailIsError()
			const interestError = this.$refs.interest.getInterestIsError()

			if (!nameError && !birthdayError && !addressError
                && !genderError && !emailError && !interestError) {
				this.post(url)
			}
		},
		post(url) {
			const params = {
				id: document.getElementById("us_id").value,
				name : this.$refs.name.getNameValue(),
				birthday: this.$refs.birthday.getBirthdayValue(),
				counties: this.$refs.address.getCountiesValue(),
				districts: this.$refs.address.getDistrictsValue(),
				road: this.$refs.address.getRoadValue(),
				gender: this.$refs.gender.getGenderValue(),
				email: this.$refs.email.getEmailValue(),
				interest: this.$refs.interest.getInterestValue(),
			}

			axios.post(url, params).then((response) => {
				if (response.data.status === "success") {
					swal({
						title: response.data.message,
						confirmButtonColor: "#e6b930",
						icon: response.data.status,
						showCloseButton: true,
					}).then(() => {
						window.location = response.data.url
					});
				}
				console.log(response)
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
