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
                    <form>
                        <div id="app" class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 id="title" class="text-center text-black font-weight-bold">@{{ title }}</h2>
                                    </div>
                                </div>
                                <name_textbox :name_error="nameStyle.Error" :name_warning="nameStyle.Warning"></name_textbox>
                                <birthday_select :birthday_error="birthdayStyle.Error" :birthday_incomplete="birthdayStyle.Incomplete"></birthday_select>
                                <address_select :address_error="addressStyle.Error" :address_incomplete="addressStyle.Incomplete"></address_select>
                                <gender_radio :gender_error="genderStyle.Error" :gender_warning="genderStyle.Warning"></gender_radio>
                                <email_textbox :email_error="emailStyle.Error" :email_warning="emailStyle.Warning" :email_format="emailStyle.Format"></email_textbox>
                                <interest_checkbox :interest_error="interestStyle.Error" :interest_warning="interestStyle.Warning"></interest_checkbox>
                                <div class="form-group">
                                    <input type="button" :class="btnStyle" :value="btnText" v-on:click="send()">
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