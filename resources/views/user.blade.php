<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <form action="{{ route('delete')}}" method="POST" id="userForm">
            {{ csrf_field() }}
            <div v-cloak id="app" class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">使用者資料</h2>
                <div style="text-align:right">
                <!--新增改用url-->
                <input type="button" id="btn_insert" class="btn btn-primary" onclick="window.location='{{ route('getForm') }}'" value="新增" />
                <input type="submit" id="btn_delete" class="btn btn-primary" value="刪除" />
                </div><br />
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>姓名</th>
                            <th>信箱</th>
                            <th>狀態</th>
                            <th>編輯設定</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--用checkbox可以做到刪除多個-->
                        <tr v-for="user in users">
                            <td><input type="checkbox" name="us_id[]" v-bind:value="user.us_id"></td>
                            <td>@{{ user.us_id }}</td>
                            <td>@{{ user.us_name }}</td>
                            <td>@{{ user.us_email }}</td>
                            <td>@{{ user.us_status == 1 ? '正常' : '停用'  }}</td>
                            <td><input type="button" class="btn btn-primary" value="編輯" v-on:click="editUserData(user.us_id)" /></td>
                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link" href="#" aria-label="Previous" v-on:click="changePage(pagination.current_page - 1)">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" :class="[ page == isActived ? 'active' : '']">
                            <a class="page-link" href="#" v-on:click="changePage(page)">@{{ page }}</a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link" href="#" aria-label="Next" v-on:click="changePage(pagination.current_page + 1)">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/user.js')}}"></script>
</body>

</html>