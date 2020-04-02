<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .vertical-center {
        min-height: 100%;
        min-height: 100vh;

        display: flex;
        align-items: center;
    }

    .card {
        width: 800px;
        font-family: '微軟正黑體';
    }

    .wrap-contact {
        background: #b3d7ff;
        justify-content: space-between;
        padding-top: 55px;
        padding-bottom: 55px;
        border-radius: 10px;
        padding: 55px 55px 55px 55px;
    }
</style>

<body>
    <div class="jumbotron vertical-center bg-light">
        <div class="container d-flex wrap-contact">
            <div class="row w-100">
                <div class="mx-auto">
                    <form id="addForm">
                        <div id="app" class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 id="title" class="text-center text-black font-weight-bold">@{{ title }}</h2>
                                    </div>
                                </div>
                                <input type="hidden" id="us_id" name="us_id" value="{{ $id_value }}">
                                <name-textbox ref="name" :name-value="'{{ $name_value }}'"></name-textbox>
                                <birthday-select ref="birthday" :years-selected="{{ $years_selected }}" :months-selected="{{ $months_selected }}" :days-selected="{{ $days_selected }}"></birthday-select>
                                <address-select ref="address" :counties-selected="{{ $counties_selected }}" :districts-selected="{{ $districts_selected }}" :road-value="'{{ $road_value }}'" :counties-data="{{ json_encode($counties) }}" :districts-data="{{ json_encode($districts) }}"></address-select>
                                <gender-radio ref="gender" :gender-checked="'{{ $gender_value }}'"></gender-radio>
                                <email-textbox ref="email" :email-value="'{{ $email_value }}'"></email-textbox>
                                <interest-checkbox ref="interest" :interest-checked="{{ json_encode($interest_value) }}"></interest-checkbox>
                                <!-- 送出要研究看看怎麼使用同一個funcrion做到新增與更新(可以用save)-->
                                <div class="form-group">
                                    <input type="button" :class="btnStyle" :value="btnText" v-on:click="send('{{ $send_name }}')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
</body>

</html>