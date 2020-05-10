import 'bootstrap/dist/css/bootstrap.css'
import channel from './components/channel.vue';

let app = new Vue({
    el: '#app',
    data: {
        title: '頻道選單',
        btnSave: 'btn btn-primary',
        sendList: []
    },
    components: {
        'channel': channel
    }
})
