import 'bootstrap/dist/css/bootstrap.css'
import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select'

var vm = new Vue({
    el: "#app",
    components: {
        "vue-select": vSelect
    },
    data: {
        options1: [
            "value1",
            "value2",
            "value3"
        ],
        options2: [{
            text: "name1",
            value: "value1"
        }, {
            text: "name2",
            value: "value2"
        }, {
            text: "name3",
            value: "value3"
        }],
        options3: [{
            label: "group1",
            options: [{
                text: "name1",
                value: "value1"
            }, {
                text: "name2",
                value: "value2"
            }, {
                text: "name3",
                value: "value3"
            }]
        }, {
            label: "group2",
            options: [{
                text: "name4",
                value: "value4"
            }, {
                text: "name5",
                value: "value5"
            }, {
                text: "name6",
                value: "value6"
            }]
        }],
        result1: "",
        result2: "",
        result3: ""
    }
});