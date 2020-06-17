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
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">頻道關聯資料</h2>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>主頻道</th>
                            <th>次頻道</th>
                            <th>課程</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($channels as $channel)
                            <tr>
                                <td>{{ $channel['masterChannels'] }}</td>
                                <td>{{ $channel['subChannels'] }}</td>
                                <td>{{ $channel['course'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>