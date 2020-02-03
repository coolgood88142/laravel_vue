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
    .card{
        width: 800px;
        font-family:'微軟正黑體';
    }
    .wrap-contact{
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
                                        <h2 id="title" class="text-center text-black font-weight-bold">填寫個人資料</h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">姓名</h3>
                                    <input type="textbox" class="form-control" id="us_name" name="us_name" />
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">生日</h3>
                                    <div class="form-check form-check-inline">
                                        <select v-model="years_selected" id="year" v-on:change="clearOptions">
                                            <option value="" disabled selected>--請選擇--</option>
                                            <option v-for="(year, index) in years" :value="index">@{{ year.value }}</option>
                                        </select>
                                        <label>年</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select v-model="months_selected" id="month" v-on:change="onChange">
                                            <option value="" disabled selected>--請選擇--</option>
                                            <option v-for="(month, index) in months" :value="index">@{{ month.value }}</option>
                                        </select>
                                        <label>月</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select v-model="months_selected" id="month" v-on:change="onChange">
                                            <option value="" disabled selected>--請選擇--</option>
                                            <option v-for="(month, index) in months" :value="index">@{{ month.value }}</option>
                                        </select>
                                        <label>月</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">地址</h3>
                                    <div class="form-check form-check-inline">
                                        <counties_select :class="[isError ? errorColor : '']" v-on:change-counties="updateDistricts"></counties_select>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <districts_select :class="[isError ? errorColor : '']" v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">性別</h3>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">男</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">女</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">email</h3>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <h3 class="text-black font-weight-bold">興趣(複)</h3>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox0" value="0">
                                        <label class="form-check-label" for="inlineCheckbox0">運動</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1">上網</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2">
                                        <label class="form-check-label" for="inlineCheckbox2">其他</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
    <script src="{{mix('js/city.js')}}"></script>
    <script src="{{mix('js/date.js')}}"></script>
</body>

</html>