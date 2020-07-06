<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
</head>

<body>
    <div class="container">
        <div id="app">
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="select1" class="col-sm-3 control-label">
                        A simple select:
                    </label>
                    <div class="col-sm-5">
                        <vue-select class="vue-select1" name="select1" :options="options1" :model.sync="result1">
                        </vue-select>
                    </div>
                    <div class="col-sm-4">
                        <p class="form-control-static">
                            Selected Result: <span class="vue-result1">@{{result1}}</span>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2" class="col-sm-3 control-label">
                        A searchable select with names and localized in en-US:
                    </label>
                    <div class="col-sm-5">
                        <vue-select class="vue-select2" name="select2" :options="options2" :model.sync="result2"
                            :searchable="true" language="en-US">
                        </vue-select>
                    </div>
                    <div class="col-sm-4">
                        <p class="form-control-static">
                            Selected Result: <span class="vue-result2">@{{result2}}</span>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select3" class="col-sm-3 control-label">
                        A searchable select with groups and localized in zh-CN:
                    </label>
                    <div class="col-sm-5">
                        <vue-select class="vue-select3" name="select3" :options="options3" :model.sync="result3"
                            :searchable="true" language="zh-CN">
                        </vue-select>
                    </div>
                    <div class="col-sm-4">
                        <p class="form-control-static">
                            Selected Result: <span class="vue-result3">@{{result3}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/vueSelect.js')}}"></script>
</body>

</html>