import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'

let app = new Vue({
    el: '#app',
    data: {
        title: 'API串接資料',
        users: []
    },
    mounted() {
        //要引用google app script的js，才可以使用SpreadsheetApp更新狀態欄位
        //有這個就不一定要使用API
        //https://script.google.com/macros/s/AKfycbx7P1Ahb9L_msEJ0rBb9z0r5lOnl6pe9DJyMQ0Xdlfff3_sUhg/exec
        axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=gTMpSUFN0h49HLC_YD9XPQ9NIIDCB0enU5hjbScjMUgCKNt5SGbST0ARVjvjzolI4ysqYt-c0a4W2hoRltslCPvMgwsyepKfm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF')
        .then(
            response => (
            this.users = response.data
        ))
        .catch(error => {
            console.log(error)
            this.errored = true
        })
        .finally(() => this.loading = false)

        // axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=ZeY4yML5iYmTjGM1LaL59Zr6_FrRJCahfDnX7hooypOYUFu3h4UPY8YpW0pnMrlV2V-BQeMJ26PecXGdpRkAxRwqRqAJukjMm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF'')
        // .then(function (response) { console.log(response.data); }).catch(function (error) { console.log(error); });
    },

})
