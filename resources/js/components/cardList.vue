<template>
    <form v-show="isShow">
        <div class="form-group row">
            <div class="card">
                <div class="card-body">
                    <div class="col" v-for="(card, index) in cardAllData" :key="index">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="selected" name="cardname" :id="cardIndexData[index]" :value="card.last">
                            <label class="form-check-label" :for="cardIndexData[index]" >
                                {{ card.cardName }}:{{ card.full }}
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="selected" name="cardname" :id="cardLastData" value="">
                            <label class="form-check-label" :for="cardLastData">
                                新增信用卡
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-primary" :id="sendId" name="send" value="送出" @click="changeCard()">
                        <!--要再多傳一個物件回來，更換信用卡資訊-->
                        <!--1.信用卡名稱送出實沒更換
                            2.選擇信用卡後沒送出，不會做重置
                            3.商品卡面要有間距
                            4.新增功能(彈跳視窗)，新增信用卡之後，商品的信用卡資訊要選到以及隱藏編輯，最上方也要更新信用卡資訊-->
                    </div>

                </div>
            </div>
        </div>
        <addCard v-if="showModal" @close="showModal = false" v-on:send-card="sendCard"></addCard>
        <message v-if="showMessage" @close="showMessage = false" :message="messageText"></message>
    </form>
</template>

<script>
import addCard from './addCard.vue';
import message from './message.vue';
export default {
    props:{
        cardData:{
            type:Array
        },
        cardIndex:{
            type:Number
        },
        cardSelected:{
            type:String
        },
        isShow:{
            type:Boolean
        }
    },
    components:{
        'addCard' : addCard,
        'message': message
    },
    data:function(){
        return {
             'cardLastData' : '',
             'selectedData' : '',
             'sendId' : 'send' + this.cardIndex,
             'selected' : this.cardSelected,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger',
             'showModal': false,
             'showMessage' : false
        }
    },
    computed: {
        cardAllData(){
            let cardArray = []
            this.cardData.forEach(function(el){
                let cardKey = Object.keys(el);
                cardArray.push(el[cardKey])
            })

            return cardArray
        },
        cardIndexData(){
            let cardIdArray = []
            let cardName = 'cardname' + this.cardIndex + "_"
            let length = this.cardData.length
            this.cardLastData = cardName + length
            for (let i = 0; i < length; i++) {
                let id = cardName + i
                cardIdArray.push(id)
            }
            return  cardIdArray
        }
    },
    methods: {
        changeCard(){
            if(this.selectedData == ''){
                this.showModal = true
            }else{
                this.$emit('change-card', this.selectedData)
            }
        },
        sendCard(CardObj){
            let isRepeat = false
            this.cardData.forEach(function(el){
                let key = Object.keys(el)
                if(CardObj.full == el[key].full){
                    isRepeat = true
                }
            })

            this.showMessage = true
            if(!isRepeat){
                this.showModal = false
                this.messageText = '新增成功!'
                this.$emit('send-card-obj', CardObj)
            }else{
                this.messageText = '資料有重複!'
            }
        }
    },
    watch:{
        selected(newVal, oldVal){
            let obj = ''
            this.cardData.forEach(function(el){
                let cardKey = Object.keys(el);
                let cardLast = el[cardKey].last

                if(newVal == cardLast){
                    obj = el
                }
            })
            this.selectedData = obj
        },
        isShow(newVal, oldVal){
            if(newVal == true){
                this.selected = this.cardSelected
            }
        }
    }
}
</script>>