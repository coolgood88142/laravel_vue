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
    .container{
        width: 540px;
    }
    .card{
        width: 500px;
    }
    .wrap-contact{
        background: #b3d7ff;
    }
</style>
<body>
    <div class="container d-flex h-100 wrap-contact">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <div id="app" class="card bg-light">
                    <div class="card-body">
                        <div class="form-group row">
                            <p class="h4">@{{ message }}</p>
                            <counties_select :class="[isError ? errorColor : '']" v-on:change-counties="updateDistricts"></counties_select>
                            <districts_select :class="[isError ? errorColor : '']" v-on:change-districts="getDistrictsSelected" :counties_selected="countiesSelected"></districts_select>
                            <button id="show" class="btn btn-primary" v-on:click="showPostalCode">@{{ showText }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/style.js')}}"></script>
    <script src="{{mix('js/city.js')}}"></script>
</body>

</html>