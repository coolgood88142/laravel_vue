import 'bootstrap/dist/css/bootstrap.css'
import card from './components/card.vue';
import message from './components/message.vue';

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
                    'cardName': '玉山銀行',
                    'full': '1111-5678-1234-5671',
                    'last': '5671',
                    'first': '1111'
                }
            },
            {
                'abc111': {
                    'cardName': '台新銀行',
                    'full': '2222-5678-0199-5672',
                    'last': '5672',
                    'first': '2222'
                }
            },
            {
                'opq111': {
                    'cardName': '中國信託',
                    'full': '3333-5978-1234-5673',
                    'last': '5673',
                    'first': '3333'
                }
            },
            {
                'def111': {
                    'cardName': '華南銀行',
                    'full': '4444-5978-1234-5674',
                    'last': '5674',
                    'first': '3333'
                }
            },
        ],
        // cardData: [],
        showErrorMessage: false,
        errorMessageText: ''
    },
    mounted() {
        // this.cardData = this.getCardData()
    },
    components: {
        'card': card,
        'message': message
    },
    computed: {
        cardData(){
            let data = []
            let cardItems = this.cardItems
            let items = this.items
            _.forEach(cardItems, function (value, key) {
                let isUse = false
                //用filter取得key，不要用forEach
                _.mapKeys(value, function(card, cardkey){
                    _.forEach(items, function (obj) {
                        if (cardkey == obj.card && obj.status == '1') {
                            isUse = true
                        }
                    })

                    let obj = {
                        'cardName': card.cardName,
                        'cardNumber': card.full,
                        'cardId': 'cardname' + key,
                        'cardValue': card.last,
                        'isUseCard': isUse
                    }
                    data.push(obj)
                })
            })
            return data
        }
    },
    methods:{
        //用computed
        // getCardData(){
        //     let cardData = []
        //     let cardItems = this.cardItems
        //     let items = this.items
        //     _.forEach(cardItems, function (value, key) {
        //         let isUse = false
        //         //用filter取得key，不要用forEach
        //         _.mapKeys(value, function(card, cardkey){
        //             _.forEach(items, function (obj) {
        //                 if (cardkey == obj.card && obj.status == '1') {
        //                     isUse = true
        //                 }
        //             })

        //             let obj = {
        //                 'cardName': card.cardName,
        //                 'cardNumber': card.full,
        //                 'cardId': 'cardname' + key,
        //                 'cardValue': card.last,
        //                 'isUseCard': isUse
        //             }
        //             cardData.push(obj)
        //         })
        //     });
        //     return cardData
        // },
        updateCardData(){
            // this.cardData = this.getCardData()
        },
        saveCardData(cardObj, index){
            let length = this.cardItems.length
            let id = Math.random().toString(36).substr(6)
            this.cardItems.push(id)
            let itenObj = new Object();
            itenObj[id] = cardObj
            this.cardItems[length] = itenObj
            this.items[index].card = id
            // this.cardData = this.getCardData()
        },
        deleteCard(index){
            try {
                //測試try-catch
                // this.cardData = ''
                this.cardData.splice(index, 1)
                this.cardItems.splice(index, 1)
            } catch(e) {
                this.showErrorMessage = true
                this.errorMessageText = '刪除失敗!'
            }
        }
    }
})
