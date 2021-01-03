module.exports = {
	env: {
		browser: true,
		es2021: true,
	},
	extends: [
		"plugin:vue/essential",
		"airbnb-base",
	],
	parserOptions: {
		ecmaVersion: 12,
		sourceType: "module",
	},
	plugins: [
		"vue",
	],
	rules: {
		indent: [
			"error",
			"tab",
		],
		"no-tabs": 0,
		"linebreak-style": [
			"error",
			"windows",
		],
		quotes: [
			"error",
			"double",
		],
		semi: [
			"error",
			"never",
		],
		// "react/jsx-filename-extension": [
		// 	1, { "extensions": [".js", ".jsx"] }
		// ],
	},
	globals: {
		todoEventBus: "readable",
	},
	"import/no-extraneous-dependencies": [
		"error", {
			'devDependencies': true
		},
	],
}
