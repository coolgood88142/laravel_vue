<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
         <div v-cloak id="app" class="content">
             <form action="{{ route('saveChannelData') }}" method="POST">
                {{ csrf_field() }}
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">@{{ title }}</h2>
                <channel :channel-data=@json($channels) :master-selected=@json($masterSelected) :sub-selected=@json($subSelected)></channel>
                <input type="submit" :class="btnSave" value="送出">
            </form>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/channel.js')}}"></script>
    <script>
        // 找找laravel變數寫在script怎麼用
        // var channel = @json($channels)
    </script>
</body>

</html>