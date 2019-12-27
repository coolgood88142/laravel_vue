/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/city.js":
/*!******************************!*\
  !*** ./resources/js/city.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var counties = [{
  text: '台北市',
  value: 0
}, {
  text: '基隆市',
  value: 1
}, {
  text: '新北市',
  value: 2
}];
var districts = [[{
  text: '中正區',
  value: 100
}, {
  text: '大同區',
  value: 103
}, {
  text: '中山區',
  value: 104
}, {
  text: '松山區',
  value: 105
}, {
  text: '大安區',
  value: 106
}, {
  text: '萬華區',
  value: 108
}, {
  text: '信義區',
  value: 110
}, {
  text: '士林區',
  value: 111
}, {
  text: '北投區',
  value: 112
}, {
  text: '內湖區',
  value: 114
}, {
  text: '南港區',
  value: 115
}, {
  text: '文山區',
  value: 116
}], [{
  text: '仁愛區',
  value: 200
}, {
  text: '信義區',
  value: 201
}, {
  text: '中正區',
  value: 202
}, {
  text: '中山區',
  value: 203
}, {
  text: '安樂區',
  value: 204
}, {
  text: '暖暖區',
  value: 205
}, {
  text: '七堵區',
  value: 206
}], [{
  text: '萬里區',
  value: 207
}, {
  text: '金山區',
  value: 208
}, {
  text: '板橋區',
  value: 220
}, {
  text: '汐止區',
  value: 221
}, {
  text: '深坑區',
  value: 222
}, {
  text: '石碇區',
  value: 223
}, {
  text: '瑞芳區',
  value: 224
}, {
  text: '平溪區',
  value: 226
}, {
  text: '雙溪區',
  value: 227
}, {
  text: '貢寮區',
  value: 228
}, {
  text: '新店區',
  value: 231
}, {
  text: '坪林區',
  value: 232
}, {
  text: '烏來區',
  value: 233
}, {
  text: '永和區',
  value: 234
}, {
  text: '中和區',
  value: 235
}, {
  text: '土城區',
  value: 236
}, {
  text: '三峽區',
  value: 237
}, {
  text: '樹林區',
  value: 238
}, {
  text: '鶯歌區',
  value: 239
}, {
  text: '三重區',
  value: 241
}, {
  text: '新莊區',
  value: 242
}, {
  text: '泰山區',
  value: 243
}, {
  text: '林口區',
  value: 244
}, {
  text: '蘆洲區',
  value: 247
}, {
  text: '五股區',
  value: 248
}, {
  text: '八里區',
  value: 249
}, {
  text: '淡水區',
  value: 251
}, {
  text: '三芝區',
  value: 252
}, {
  text: '石門區',
  value: 253
}]];
var bus = new Vue();
Vue.component('counties_select', {
  props: {
    counties_array: {
      type: Array,
      required: true
    },
    counties_selected: {
      type: String
    }
  },
  template: '<select v-model="counties_selected" id="counties" @change="UpdateDistricts">' + '<option value="" disabled selected>--請選擇--</option>' + '<option v-for="counties in counties_array" :value="counties.value">{{ counties.text }}</option>' + '</select>',
  methods: {
    UpdateDistricts: function UpdateDistricts() {
      bus.$emit('UpdateDistricts', this.counties_selected);
    }
  }
});
Vue.component('districts_select', {
  props: {
    districts_array: {
      type: Array,
      required: true
    },
    districts_selected: {
      type: String
    }
  },
  template: '<select v-model="districts_selected" id="districts">' + '<option value="" disabled selected>--請選擇--</option>' + '<option v-for="districts in districts_array" :value="districts.value">{{ districts.text }}</option>' + '</select>'
});
var app = new Vue({
  el: '#app',
  data: {
    message: 'Vue練習:'
  },
  methods: {
    UpdateDistricts: function UpdateDistricts(selected) {
      this.counties_selected = selected;
      this.districts_array = districts[selected];
    }
  },
  created: function created() {
    bus.$on('UpdateDistricts', this.UpdateDistricts);
  }
});
app.counties_array = counties;
app.counties_selected = '';
app.districts_array = '';
app.districts_selected = '';

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/city.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\laravel_vue\resources\js\city.js */"./resources/js/city.js");


/***/ })

/******/ });