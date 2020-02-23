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
                        }else if (isRemind) {
                            newClass = defaultClass[el]
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
            for(let i = 0; i < value.length; i++){
                if (value == '' || value == null) {
                    isError = true
                    break
                }
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