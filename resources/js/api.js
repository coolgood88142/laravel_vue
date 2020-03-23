import 'bootstrap/dist/css/bootstrap.css'

let app = new Vue({
    el: '#app',
    data: {
        title: 'API串接資料',
        user: ''
    },
    mounted() {
        
        axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=xXgqwDhjBC0_AwrO98NMGQOj0oEAymAMOzlJnztfp8hvtDd83CmHhC_IGcoQp4mX2ueBtkt-kwBTLzyLW-3npV17bIOOeewam5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF')
            .then(response => (this.users = response))
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
    },

})
