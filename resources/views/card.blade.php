<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div id="app">
            <card v-for="(item, index) in items" v-bind:item="item" v-bind:index="index" v-bind:key="item.id" :card-item="cardList[index]" ></card>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/card.js')}}"></script>
</body>

</html>