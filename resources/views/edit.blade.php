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
                    <form action="{{ route('add')}}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div id="app" class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 id="title" class="text-center text-black font-weight-bold">@{{ title }}</h2>
                                    </div>
                                </div>
                                <name_textbox ref="name" :editNameValue="{{ json_encode($users['name_value']) }}"></name_textbox>
                                <birthday_select ref="birthday" :editYearsSelected="{{ json_encode($users['years_selected']) }}" :editMonthsSelected="{{ json_encode($users['months_selected']) }}" :editDaysSelected="{{ json_encode($users['days_selected']) }}"></birthday_select>
                                <address_select ref="address" :editCountiesSelected="{{ json_encode($users['counties_selected']) }}" :editDistrictsSelected="{{ json_encode($users['districts_selected']) }}" :editRoadValue="{{ json_encode($users['road_value']) }}" :counties_data="{{ json_encode($users['counties']) }}" :districts_data="{{ json_encode($users['districts']) }}"></address_select>
                                <gender_radio ref="gender" :editGenderChecked="{{ json_encode($users['gender_value']) }}"></gender_radio>
                                <email_textbox ref="email" :editEmailValue="{{ json_encode($users['email_value']) }}"></email_textbox>
                                <interest_checkbox ref="interest" :interestChecked="{{ json_encode($users['interest_value']) }}"></interest_checkbox>
                                <!-- 送出要研究看看怎麼使用同一個funcrion做到新增與更新(可以用save)-->
                                <div class="form-group">
                                    <input type="submit" :class="btnStyle" :value="btnText">
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