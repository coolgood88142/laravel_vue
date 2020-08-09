<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div id="app" class="justify-content-center align-items-center">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card List</h5>
                            <p v-for="(card, index) in cardData" :key="index">@{{ card.cardName }}:@{{ card.cardNumber }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <card v-for="(item, index) in items" v-bind:item="item" v-bind:index="index" v-bind:key="item.id" :card-item="cardItems[index]" :card-data="cardData"></card>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/card.js')}}"></script>
</body>

</html>