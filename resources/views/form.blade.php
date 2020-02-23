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
                                <!--ref-->
                                <name_textbox :input_class="nameEl.nameInputClass" :small_class="nameEl.nameSmallClass" v-on:input-value="updateNameValue"></name_textbox>
                                <name_textbox :input_class="nameEl.nameInputClass" :small_class="nameEl.nameSmallClass" v-on:input-value="updateNameValue"></name_textbox>
                                <birthday_select :select_class="birthdaySelectClass" :small_class="birthdaySmallClass" :incomplete="birthdayIcomplete" v-on:select-value="updateBirthdayValue"></birthday_select>
                                <address_select :input_class="addressInputClass" :select_class="addressSelectClass" :small_class="addressSmallClass" :incomplete="addressIcomplete" v-on:select-value="updateAddressValue"></address_select>
                                <gender_radio :check_label_class="genderCheckLabelClass" :small_class="genderSmallClass" v-on:check-label-value="updateGenderValue"></gender_radio>
                                <email_textbox :input_class="emailInputClass" :small_class="emailSmallClass" :wrong_format="emailFormat" v-on:input-value="updateEmailValue"></email_textbox>
                                <interest_checkbox :check_label_class="interestCheckLabelClass" :small_class="interestSmallClass" v-on:check-label-value="updateInterestValue"></interest_checkbox>
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