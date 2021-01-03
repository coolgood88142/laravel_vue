const elementClass = {
	text: "form-text",
	input: "form-control border",
	select: "custom-select ",
	checklabel: "form-check-label ",
}

const changeClass = {
	hide: "d-none",
	border: "border-danger",
	textError: "text-danger",
	textRemind: "text-secondary",
}

const defaultClass = {
	text: elementClass.text + changeClass.hide,
	textError: elementClass.text + changeClass.textError,
	input: elementClass.input + changeClass.border,
	select: elementClass.select + changeClass.textError,
	checklabel: elementClass.checklabel + changeClass.textError,
}

export default {
	methods: {
		setElementClass(isError, type, isRemind) {
			let newClass = ""
			const elementArray = Object.keys(elementClass)

			elementArray.forEach((key) => {
				if (key === type) {
					if (!isError) {
						newClass = elementClass[key]
						if (key === "text") {
							newClass += (isRemind ? changeClass.textRemind : changeClass.hide)
						}
					} else {
						newClass = defaultClass[key]
						if (key === "text") {
							newClass = defaultClass.textError
						}
					}
				}
			})

			return newClass
		},
		isValueNullOrEmpty(value) {
			let isError = false
			if (value === "" || value == null) {
				isError = true
			}

			return isError
		},
		getInputClass() {
			return elementClass.input
		},
		getTextClass() {
			return defaultClass.text
		},
		getSelectClass() {
			return elementClass.select
		},
		getCheckLabelClass() {
			return elementClass.checklabel
		},
	},
}
