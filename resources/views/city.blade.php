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
            <counties_select v-on:get-districts="UpdateDistricts" :style="styleObject"></counties_select>
            <districts_select v-on:get-districts-data="GetDistrictsData" :style="styleObject" :districts_selected="districts_selected" :districts_array="districts_array"></districts_select>
            <postalcode v-on:get-postalcode="ShowPostalCode"></postalcode>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/city.js')}}"></script>
    </body>
</html>