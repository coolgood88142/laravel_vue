//補上是否為空值的function(value, type)
//宣告變數帶type要加的class
//回傳陣列資料去對應class要放什麼值
//有值class為空字串，沒值要加class資料

let elementClass = {
    text: 'form-text ',
    input: 'form-control border ',
    select: 'custom-select ',
    checklabel: 'form-check-label '
}

let changeClass= {
    hide: 'd-none',
    border: 'border-danger',
    textError: 'text-danger',
    textRemind: 'text-secondary'
}

let defaultClass = {
    text: elementClass.text + changeClass.hide,
    textError: elementClass.text + changeClass.textError,
    input: elementClass.input + changeClass.border,
    select: elementClass.select + changeClass.textError,
    checklabel: elementClass.checklabel + changeClass.textError
}

//新增type變數元素，寫一個集合
//確認是否寫取得components的template做迴圈，設定class

export default {
    methods: {
        setElementClass: function (isError, type, isRemind) {
            let newClass = ''
            for (let el in elementClass) {
                if(el === type){
                    if(!isError){
                        newClass = elementClass[el]
                        if(el === "text"){
                            newClass += (isRemind ? changeClass.textRemind : changeClass.hide)
                        }
                    }else{
                        if (el === "text"){
                            newClass = defaultClass.textError
                        }else{
                            newClass = defaultClass[el]
                        }
                    }
                    break
                }
            }
            return newClass
        },
        isValueNullOrEmpty: function(value){
            let isError = false
            if (value == '' || value == null) {
                isError = true
             }

            return isError
        },
        getInputClass: function () {
            return elementClass.input
        },
        getTextClass: function () {
            return defaultClass.text
        },
        getSelectClass: function () {
            return elementClass.select
        },
        getCheckLabelClass: function () {
            return elementClass.checklabel
        }
    }
}