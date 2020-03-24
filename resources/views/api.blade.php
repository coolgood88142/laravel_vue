<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
</head>

<body>
    <div class="container">
        <form  method="POST" id="userForm">
            {{ csrf_field() }}
            <div v-cloak id="app" class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">@{{ title }}</h2>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>姓名</th>
                            <th>生日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--用checkbox可以做到刪除多個-->
                        <tr v-for="user in users">
                            <td>@{{ user.id }}</td>
                            <td>@{{ user.name }}</td>
                            <td>@{{ user.birthday }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/api.js')}}"></script>
</body>

</html>