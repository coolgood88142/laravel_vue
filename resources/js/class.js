
export default {
    methods: {
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
                success: 'form-check-label custom-select'
            }
        }
    }
}