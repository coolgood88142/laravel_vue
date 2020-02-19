//補上是否為空值的function(value, type, class)
//value、type、class為陣列資料型態
//宣告變數帶type要加的class
//回傳陣列資料去對應class要放什麼值
//有值class為空字串，沒值要加class資料
export default {
    data:{
        text: {
            error: 'text-danger',
            remind: 'text-secondary',
            hide: 'd-none'
        },
        input: 'border-danger'
    },
    methods: {
        setElementClass: function(value_array, type_array) {
            let class_array = []
            for (let i = 0; i < value_array.length; i++) {
                value = value_array[i]
                type = type_array[i]
                if (value != '') {
                    
                }else{

                }
            }
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