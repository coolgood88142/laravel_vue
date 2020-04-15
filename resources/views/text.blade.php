<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
</head>

<body>
    <div class="container">
        <form method="POST" id="userForm">
            {{ csrf_field() }}
            <div v-cloak id="app" class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">單字長度
                </h2>
                <input type="text" id="textlength" name="textlength" value="">
                <input type="submit" value="送出">
            </div>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>