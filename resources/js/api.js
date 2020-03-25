import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'

let app = new Vue({
    el: '#app',
    data: {
        title: 'API串接資料',
        users: []
    },
    mounted() {
        // axios.defaults.headers['Content-Type'] = 'application/json;charset=UTF-8'
        // axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=ZeY4yML5iYmTjGM1LaL59Zr6_FrRJCahfDnX7hooypOYUFu3h4UPY8YpW0pnMrlV2V-BQeMJ26PecXGdpRkAxRwqRqAJukjMm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF'
        //     params:{
        //         user_content_key:
        //     }
        // )
            
        // .then(response => (this.users = response))
        //     .catch(error => {
        //         console.log(error)
        //         this.errored = true
        //     })
        //     .finally(() => this.loading = false)

        axios.get('https://script.googleusercontent.com/macros/echo?user_content_key=ZeY4yML5iYmTjGM1LaL59Zr6_FrRJCahfDnX7hooypOYUFu3h4UPY8YpW0pnMrlV2V-BQeMJ26PecXGdpRkAxRwqRqAJukjMm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF')
        .then(function (response) { console.log(response.data); }).catch(function (error) { console.log(error); });
    },

})
