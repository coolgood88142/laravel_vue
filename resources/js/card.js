import 'bootstrap/dist/css/bootstrap.css'
import card from './components/card.vue';

let app = new Vue({
    el: '#app',
    data: {
        title: '卡片狀態',
        items: [
            {
                'name': 'apple',
                'price': 1500,
                'card': 'xyz111',
                'datetime': '2020-08-05 11:32:53',
                'status': 1
            },
            {
                'name': 'banana',
                'price': 1000,
                'card': 'abc111',
                'datetime': '2020-08-05 11:45:15',
                'status': 0
            },
            {
                'name': 'orange',
                'price': 2000,
                'card': 'opq111',
                'datetime': '2020-08-05 11:05:53',
                'status': 1
            },
        ],
        cardItems : [
            {
                'xyz111': {
                    'cardId': 'cardname0',
                    'cardName': '玉山銀行',
                    'full': '1111-5678-1234-5671',
                    'last': '5671',
                    'first': '1111'
                }
            },
            {
                'abc111': {
                    'cardId': 'cardname1',
                    'cardName': '台新銀行',
                    'full': '2222-5678-0199-5672',
                    'last': '5672',
                    'first': '2222'
                }
            },
            {
                'opq111': {
                    'cardId': 'cardname2',
                    'cardName': '中國信託',
                    'full': '3333-5978-1234-5673',
                    'last': '5673',
                    'first': '3333'
                }
            },
            {
                'def111': {
                    'cardId': 'cardname3',
                    'cardName': '華南銀行',
                    'full': '4444-5978-1234-5674',
                    'last': '5674',
                    'first': '3333'
                }
            },
        ],
        cardData: []
    },
    mounted() {
        this.cardData = this.getCardData()
    },
    components: {
        'card': card
    },
    methods:{
        getCardData(){
            let cardData = []
            this.cardItems.forEach(function(el, index, key) {
                let card = Object.keys(el)
                let obj = {
                    'cardName' : el[card[0]].cardName,
                    'cardNumber' : el[card[0]].full,
                    'cardId': 'cardname' + index,
                    'cardValue': el[card[0]].last
                }
                cardData.push(obj)
            });
            return cardData
        }
    }
})
