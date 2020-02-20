//補上是否為空值的function(value, type)
//宣告變數帶type要加的class
//回傳陣列資料去對應class要放什麼值
//有值class為空字串，沒值要加class資料
let classData =  {
    "input": {
        error: 'border-danger',
        normal: ''
               },
    "text": {
        error: 'text-danger',
        remind: 'text-secondary',
        hide: 'd-none',
        normal: ''
    }
}

export default {
    methods: {
        setElementClass: function (value, type) {
            let class_data = {}
            let isError = false
            let type_data = classData.type
            if (value == '') {
                isError = true
                class_data.class = type_data.error
            }else{
                class_data.class = type_data.error
            }
            class_data.isError = isError

            return class_data
        },
        getElementClass: function(){
            console.log('text')
        },
        getTextBoxClass: function () {
            return {
                error: 'form-control border border-danger',
                success: 'form-control border'
            }
        },
        getTextClass: function () {
            return {
                error: 'form-text text-danger',
                remind: 'form-text text-secondary',
                success: 'form-text d-none'
            }
        },
        getSelectClass: function () {
            return {
                error: 'custom-select text-danger',
                success: 'custom-select'
            }
        },
        getCheckBoxClass: function () {
            return {
                error: 'form-check-label text-danger',
                success: 'form-check-label'
            }
        }
    }
}