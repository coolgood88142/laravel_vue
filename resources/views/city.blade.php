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
            <counties_select v-on:update-districts="UpdateDistricts" :style="styleObject"></counties_select>
            <districts_select v-on:get-districts-selected="GetDistrictsSelected" v-on:get-districts-data="GetDistrictsData" :style="styleObject" :districts_array="districts_array"></districts_select>
            <button id="show" v-on:click="ShowPostalCode">@{{ showText }}</button>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/city.js')}}"></script>
    </body>
</html>