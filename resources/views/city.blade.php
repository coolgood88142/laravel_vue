<html>

<body>
    <link rel="stylesheet" href="/css/admin.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    <div id="app">
        {{ @message }}
        <select v-model="counties_selected" id="counties" v-on:change="onChange">
            <option value="" disabled selected>--請選擇--</option>
            <option v-for="counties in counties_array" :value="counties.value">{{ @counties.text }}</option>
        </select>
        <districts_selct :districts_selected="districts_selected" :districts_array="districts_array"></districts_selct>
    </div>
    <script src="{{mix('js/vue.js')}}"></script>
    <script src="{{mix('js/date.js')}}"></script>
</body>

</html>