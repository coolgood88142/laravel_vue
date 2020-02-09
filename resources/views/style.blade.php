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
        width: 640px;
    }
    .wrap-contact{
        background: #b3d7ff;
        padding-top: 55px;
        padding-bottom: 55px;
        border-radius: 10px;
        padding: 55px 55px 55px 55px;
    }
</style>
<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100 wrap-contact">
            <div class="mx-auto">
                <div id="app" class="card">
                     <div class="card-body">
                         <div class="form-group row">
                            <label :class="textStyle">@{{ message }}</label>
                            <div class="col-4">
                                <counties_select :class="[countiesError ? errorColor : '']" v-on:change-counties="updateDistricts"></counties_select>
                            </div>
                            <div class="col-4">
                                <districts_select :class="[districtsError ? errorColor : '']" v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
                            </div>
                            <button id="show" :class="btnStyle" v-on:click="showPostalCode">@{{ showText }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/city.js')}}"></script>
</body>

</html>