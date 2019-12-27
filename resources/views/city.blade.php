<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            @{{ message }}
            <counties_select counties_selected="counties_selected" counties_array="counties_array"></counties_select>
            <districts_select districts_selected="districts_selected" districts_array="districts_array"></districts_select>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/city.js')}}"></script>
    </body>

</html>