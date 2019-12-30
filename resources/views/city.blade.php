<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <style type="text/css">
        [v-cloak] {
            display: none;
        }
    </style>
    <body>
        <div id="app" v-cloak>
            @{{ message }}
            <counties_select></counties_select>
            <districts_select></districts_select>
            <postalcode></postalcode>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/city.js')}}"></script>
    </body>
</html>