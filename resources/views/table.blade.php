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
                        <th></th>
                        <th>姓名</th>
                        <th>性別</th>
                        <th>狀態</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>