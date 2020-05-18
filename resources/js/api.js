import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'

let app = new Vue({
    el: '#app',
    data: {
        title: 'API串接資料',
        users: []
    },
    mounted() {
        //後端執行完新增資料之後在這裡使用google app script
        //取得試算表資料做更新狀態欄位
        axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=-yex6UFY5iOjrDBSTF9Xk-tuy_e1WRzVdLXbLWBehCM0_M36v8eUV5JI_lr40LVHZmcKQaLgNg2NILiGhWlTjpxtast2Plb-m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF')
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
