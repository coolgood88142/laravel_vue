import "bootstrap/dist/css/bootstrap.css"
import radio from "./components/radio.vue"

let app = new Vue({
	el: "#app",
	data: {
		feedItems: [
			{
				1: {
					name: "蘋果",
					isHide: false,
				},
				2: {
					name: "香蕉",
					isHide: false,
				},
				3: {
					name: "可樂",
					isHide: true,
				},
				4: {
					name: "汽水",
					isHide: true,
				}
			},
			
		],
	},
	components: {
		"radio": radio,
	},
})
