<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .jumbotron{
        height:100%;
        width:100%;
    }
    .vertical-center {
        min-height: 100%;
        min-height: 100vh;
        
        display: flex;
        align-items: center;
    }
    .container{
        width: 530px;
    }
    .card{
        width: 450px;
    }
    .wrap-contact{
        background: #b3d7ff;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-top: 55px;
        padding-bottom: 55px;
        border-radius: 10px;
        padding: 55px 55px 55px 55px;
    }
</style>
<body>
    <div class="jumbotron vertical-center bg-light">
        <div class="container wrap-contact">
            <div class="row justify-content-center align-items-center">
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
</body>

</html>