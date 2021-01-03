import "bootstrap/dist/css/bootstrap.css"
import counties from "./components/counties.vue";
import districts from "./components/districts.vue";
import postalcode from "./components/postalcode.vue";

let app = new Vue({
	el: "#app",
	data: {
		message: "Vue練習:",
		showText: "顯示郵遞區號!",
		countiesSelected: NaN,
		districtsSelected: "",
		btnStyle: "btn btn-primary",
		cityStyle: {
			countiesError: false,
			districtsError: false,
			errorColor: "text-danger",
			textStyle: "text-black font-weight-bold",
		},
	},
	components: {
		"counties_select": counties,
		"districts_select": districts,
		"postalcode": postalcode
	},
	methods: {
		getDistrictsSelected(DistrictsSelected) {
			this.districtsSelected = DistrictsSelected;
		},
		updateDistricts(CountiesSelected) {
			this.countiesSelected = CountiesSelected;
		},
		showPostalCode() {
			const counties = document.getElementById("counties")
			const districts = document.getElementById("districts")
			const countiesVal = counties.options[counties.selectedIndex].value
			const districtsVal = districts.options[districts.selectedIndex].value
			const showText = ""

			if (countiesVal === "") {
				this.countiesError = true
			} else {
				this.countiesError = false
			}

			if (districtsVal === "") {
				this.districtsError = true
			} else {
				this.districtsError = false
			}

			if (countiesVal !== "" && districtsVal !== "") {
				const countiesText = counties.options[counties.selectedIndex].text
				const districtsText = districts.options[districts.selectedIndex].text
				const num = this.districtsSelected

				showText = `${countiesText}" "${districtsText}郵遞區號為：${num}`
				alert(showText)
			}
		},
	},
})