<template>
	<div class="form-group">
		<h3 class="text-black font-weight-bold">{{ emailText }}</h3>
		<input type="email" :class="inputClass" id="us_email" name="us_email" v-model="userEmail">
		<small v-if="emailError" id="warning" :class="smallClass">
            {{ isFormat ? remindText : warningText }}
        </small>
	</div>
</template>

<script>
import verification from "./mixins/verification.js";

export default {
	mixins: [verification],
	props: {
		emailValue: {
			type: String,
		},
	},
	data() {
		return {
			emailText: "email",
			warningText: "email必填",
			remindText: "email格式錯誤",
			emailError: true,
			isFormat: false,
			inputClass: this.getInputClass(),
			smallClass: this.getTextClass(),
			userEmail: this.emailValue,
		}
	},
	methods: {
		getEmailIsError() {
			const emailError = this.isValueNullOrEmpty(this.userEmail)

			if (emailError) {
				this.emailError = true
				this.isFormat = false
			} else {
				const isMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/
				if (!isMail.test(this.userEmail)) {
					this.emailError = true
					this.isFormat = true
				} else {
					this.emailError = false
					this.isFormat = false
				}
			}

			this.isShow = this.emailError
			this.inputClass = this.setElementClass(emailError, "input", false)
			this.smallClass = this.setElementClass(emailError, "text", this.isFormat)
			return this.emailError
		},
		getEmailValue() {
			return this.userEmail
		},
	},
	watch: {
		userEmail() {
			this.getEmailIsError()
		},
	},
}
</script>
