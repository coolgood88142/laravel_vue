<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            @{{ message }}
            <master-select></master-select>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/list.js')}}"></script>
    </body>
</html>