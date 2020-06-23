import 'bootstrap/dist/css/bootstrap.css'
import channelsRelation from './components/channelsRelation.vue';

let app = new Vue({
    el: '#app',
    data: {
        title: '頻道關聯資料',
        btnSave: 'btn btn-primary',
        sendList: []
    },
    components: {
        'channelsRelation': channelsRelation
    }
})
