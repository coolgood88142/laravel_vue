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
                    <form action="{{ route('add')}}" method="POST">
                        {{ csrf_field() }}
                        <div id="app" class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 id="title" class="text-center text-black font-weight-bold">@{{ title }}</h2>
                                    </div>
                                </div>
                                <name_textbox ref="nameRef" :input_class="name.inputClass" :small_class="name.smallClass"></name_textbox>
                                <birthday_select ref="birthdayRef" :year_select_class="birthday.yearSelectClass" :month_select_class="birthday.monthSelectClass" :day_select_class="birthday.daySelectClass" :small_class="birthday.smallClass" :incomplete="birthday.icomplete"></birthday_select>
                                <address_select ref="addressRef" :counties_select_class="address.countiesSelectClass" :districts_select_class="address.districtsSelectClass" :input_class="address.inputClass" :small_class="address.smallClass" :incomplete="address.icomplete"></address_select>
                                <gender_radio ref="genderRef" :check_label_class="gender.checkLabelClass" :small_class="gender.smallClass"></gender_radio>
                                <email_textbox ref="emailRef" :input_class="email.inputClass" :small_class="email.smallClass" :wrong_format="email.format"></email_textbox>
                                <interest_checkbox ref="interestRef" :check_label_class="interest.checkLabelClass" :small_class="interest.smallClass"></interest_checkbox>
                                <div class="form-group">
                                    <input type="submit" :class="btnStyle" :value="btnText" v-on:click="send()">
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