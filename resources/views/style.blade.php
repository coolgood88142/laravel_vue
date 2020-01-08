<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        @{{ message }}
        <counties_select class="text-danger" v-on:change-counties="updateDistricts"></counties_select>
        <districts_select class="text-danger" v-on:change-districts="getDistrictsSelected" :counties_selected="counties_selected"></districts_select>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
    <script src="{{mix('js/city.js')}}"></script>
</body>

</html>