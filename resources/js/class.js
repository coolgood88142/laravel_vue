let textbox_class = {
    error: 'form-control border border-danger',
    success: 'form-control border'
}

let text_class = {
    error: 'form-text text-danger',
    remind: 'form-text text-black',
    success: 'form-text d-none'
}

let select_class = {
    error: 'custom-select text-danger',
    success: 'custom-select'
}

let formcheck_class = {
    error: 'form-check-label text-danger',
    success: 'form-check-label custom-select'
}


function elementSetClass(el, style){
    el.setAttribute("class", style)
}