<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
</head>

<body>
    <div class="container">
        <div id="el">
            <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">@{{ title }}</h2>
            <v-select v-model="tet" :options="options" value="code" label="id"></v-select>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/vueSelect.js')}}"></script>
</body>

</html>