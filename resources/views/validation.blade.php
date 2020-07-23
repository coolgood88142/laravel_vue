<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <form action="{{ route('sendValidation') }}" method="POST" id="userForm">
            {{ csrf_field() }}
            <div v-cloak id="app" class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">使用者驗證</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table>
                    <tr>
                        <th>姓名</th>
                        {{-- <th>信箱</th> --}}
                        <th>性別</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="name" name="name" value="" /></th>
                        {{-- <th><input type="text" id="email" name="email" value="" /></th> --}}
                        <th><input type="text" id="gender" name="gender" value="" /></th>
                    </tr>
                </table>
            </div>

            <input type="submit" id="send" name="send" value="送出"/>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>