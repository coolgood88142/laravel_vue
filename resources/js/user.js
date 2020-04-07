import 'bootstrap/dist/css/bootstrap.css'
import swal from 'sweetalert'
import pagination_vav from './components/pagination.vue'

let user = new Vue({
    el: '#app',
    data: {
        users: [],
        checkedUsers:[],
        pagination: {},
        getPage:1
        // url:{{ json_encode($url) }}
        //傳rotue進來，找找看怎麼寫
    },
    components:{
        'pagination-vav': pagination_vav
    },
    mounted: function () {
        this.getUserData(1)
    },
    methods: {
        getPagination: function (getPage){
            this.getUserData(getPage)
        },
        getUserData: function (page) {
            axios.get('/getUserData?page=' + page).then(response => {
                this.users = response.data.users.data,
                this.pagination = response.data.pagination
            }).catch((error) => {
                //顯示請求資料失敗的錯誤訊息
                if (error.response){
                    //在log顯示response錯誤的資料、狀態、表頭
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                }else{
                    //在log顯示r錯誤訊息
                    console.log('Error',error.message);
                }
                
            })
        },
        editUserData: function (id){
            window.location.href = '/editUserData?id='+id
        },
        deleteUserData: function(){
            let current_page = this.pagination.current_page

            axios.post('/deleteUserData', {
                id: this.checkedUsers 
            }).then(response => {
                if (response.data.status == 'success') {
                    swal({
                        title: response.data.message,
                        confirmButtonColor: "#e6b930",
                        icon:response.data.status,
                        showCloseButton: true
                    }).then(function() {
                        window.location = response.data.url
                    });
                }
            }).catch((error) => {
                //顯示請求資料失敗的錯誤訊息
                if (error.response) {
                    //在log顯示response錯誤的資料、狀態、表頭
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else {
                    //在log顯示r錯誤訊息
                    console.log('Error', error.message);
                }

            })
        }
    }
})