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
        <select v-model="years_selected" id="year" v-on:change="clearOptions">
            <option value="" disabled selected>--請選擇--</option>
            <option v-for="(year, index) in years" :value="index">@{{ year.text }}</option>
        </select>
        <label>年</label>
        <select v-model="months_selected" id="month" v-on:change="onChange">
            <option value="" disabled selected>--請選擇--</option>
            <option v-for="(month, index) in months" :value="index">@{{ month.text }}</option>
        </select>
        <label>月</label>
        <select v-model="days_selected" id="day">
            <option value="" disabled selected>--請選擇--</option>
            <option v-for="day in days" :value="day">{{ @day }}</option>
        </select>
        <label>日</label>
    </div>
    <script src="{{mix('js/manifest.js')}}"></script>
    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/date.js')}}"></script>
</body>

</html>