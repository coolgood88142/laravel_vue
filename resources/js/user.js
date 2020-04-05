import 'bootstrap/dist/css/bootstrap.css'
import swal from 'sweetalert'
import pagination_vav from './components/pagination.vue'

let user = new Vue({
    el: '#app',
    data: {
        users: [],
        checkedUsers:[],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        // url:{{ json_encode($url) }}
        //傳rotue進來，找找看怎麼寫
    },
    components:{
        'pagination-vav': pagination_vav
    },
    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    mounted: function () {
        this.getUserData(this.pagination.current_page)
    },
    methods: {
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
        changePage: function (page) {
            this.pagination.current_page = page
            this.getUserData(page)
        },
        editUserData: function (id){
            window.location.href = '/editUserData?id='+id
        },
        deleteUserData: function(){
            let params = {
                id : this.checkedUsers
            }

            axios.post('/deleteUserData', params).then(response => {
                if (response.data.status == 'success') {
                    swal({
                        title: response.data.message,
                        confirmButtonColor: "#e6b930",
                        icon:response.data.status,
                        showCloseButton: true
                    }).then(function() {
                        this.changePage(this.pagination.current_page)
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