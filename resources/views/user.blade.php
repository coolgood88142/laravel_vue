<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div class="content">
            <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">使用者資料</h2>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>信箱</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->us_id }}</td>
                        <td>{{ $user->us_name }}</td>
                        <td>{{ $user->us_email }}</td>
                        <td>{{ $user->us_status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
</body>

</html>