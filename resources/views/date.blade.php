<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            @{{ message }}
            <select v-model="years_selected" id="year" v-on:change="clearOptions">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(year, index) in years" :value="index">@{{ year.value }}</option>
            </select>
            <label>年</label>
            <select v-model="months_selected" id="month" v-on:change="onChange">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="(month, index) in months" :value="index">@{{ month.value }}</option>
            </select>
            <label>月</label>
            <select v-model="days_selected" id="day">
                <option value="" disabled selected>--請選擇--</option>
                <option v-for="day in days" :value="day">@{{ day }}</option>
            </select>
            <label>日</label>
            <button id="show" @click="ShowDate">@{{ showText }}</button>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/date.js')}}"></script>
    </body>

</html>