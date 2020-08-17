<template>
    <div class="row" style="margin-bottom: 60px;">
        <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">商品：{{ selectItem.name }}</p>
                <p class="card-text">價錢：{{ selectItem.price }}</p>
                <p v-show="isStatus" class="card-text">卡號末四碼：{{ cardSelected }}</p>
                <p class="card-text">刷卡時間：{{ selectItem.datetime }}</p>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text">信用卡名稱：{{ cardName }}</p>
                    </div>
                    <div class="col-2">
                        <input type="button" :class="btnEdit" :value="editText" v-on:click="changeCard()"/>
                    </div>
                </div>
                <cardList :is-show="isShow" :card-data="cardData" :card-index="index" :card-selected="cardSelected" v-on:change-card="updateCardValue"></cardList>
                <addCard v-if="showModal" @close="showModal = false" v-on:send-card="sendCard"></addCard>
                <repeatCard v-if="showRepeat" @close="showRepeat = false"></repeatCard>
                <successCard v-if="showSuccess" @close="showSuccess = false"></successCard>
                <input type="button" :class="isStatus ? btnDanger : btnSuccess" :value="isStatus ? dangerText : successText" v-on:click="changeStatus(selectItem.status)"/>
                <!--排版改用3列，cardList放最上面，停止功能改用只顯示商品、價錢、文字(是否已啟用?)、啟用按鈕-->
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import cardList from './cardList.vue';
import addCard from './addCard.vue';
import repeatCard from './repeatCard.vue';
import successCard from './successCard.vue';
export default {
    props:{
        item:{
            type:Object
        },
        cardData:{
            type:Array
        },
        index:{
            type:Number
        }
    },
    components: {
        'cardList': cardList,
        'addCard' : addCard,
        'repeatCard': repeatCard,
        'successCard' : successCard
    },
    data:function(){
        return {
             'selectItem': this.item,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger',
             'btnEdit' : 'btn btn-primary',
             'successText' : '啟用',
             'dangerText' : '停止',
             'editText' : '編輯',
             'isStatus' : this.item.status == '1',
             'isShow' : false,
             'showModal': false,
             'showRepeat' : false,
             'showSuccess' : false
        }
    },
    computed: {
        itemData(){
            let item = ""
            let select = this.selectItem
            this.cardData.forEach(function(el){
                let cardKey = Object.keys(el);
                if(select.card == cardKey[0]){
                    item = el
                }
            })
            return item
        },
        cardName(){
            let cardKey = Object.keys(this.itemData);
            if(this.item.card == cardKey[0]){
                return this.itemData[cardKey[0]].cardName
            }
        },
        cardSelected(){
            let cardKey = Object.keys(this.itemData);
            if(this.item.card == cardKey[0]){
                return this.itemData[cardKey[0]].last
            }
        }
    },
    methods: {
        changeStatus(status){
            if(status == '0'){
                this.item.status = '1'
                this.isStatus = true
            }else{
                this.item.status = '0'
                this.isStatus = false
            }
        },
        changeCard(){
            if(this.isShow){
                this.isShow = false
            }else{
                this.isShow = true
            }
            // this.cardSelected = this.cardValue
        },
        updateCardValue(CardObj) {
            if(CardObj != ''){
                let key = Object.keys(CardObj)
                this.selectItem.card = key[0]
                // this.itemData = CardObj
                this.isShow = false
            }else{
                this.showModal = true
            }
        },
        sendCard(CardObj){
            let isRepeat = false
            this.cardData.forEach(function(el){
                let key = Object.keys(el)
                console.log(el[key])
                if(CardObj.full == el[key].full){
                    isRepeat = true
                }
            })

            this.showModal = false
            if(isRepeat){
                this.showRepeat = true
            }else{
                this.showSuccess = true
                this.isShow = false
                this.$emit('send-card-obj', CardObj, this.index)
            }
            
        }
    },
    watch:{
        showRepeat(newVal){
            if(!newVal){
                this.showModal = true
            }
        }
    }
}
</script>>