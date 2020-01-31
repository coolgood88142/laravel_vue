<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        @{{ message }}
        <counties_select :class="[isError ? errorColor : '']" v-on:change-counties="updateDistricts"></counties_select>
        <districts_select :class="[isError ? errorColor : '']" v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
        <button id="show" v-on:click="showPostalCode">@{{ showText }}</button>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
    <script src="{{mix('js/city.js')}}"></script>
</body>

</html>