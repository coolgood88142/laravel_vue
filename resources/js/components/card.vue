<template>
    <div class="row">
        <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">商品：{{ selectItem.name }}</p>
                <p class="card-text">價錢：{{ selectItem.price }}</p>
                <p v-show="isStatus" class="card-text">卡號末四碼：{{ cardValue }}</p>
                <p class="card-text">刷卡時間：{{ selectItem.datetime }}</p>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text">信用卡名稱：{{ cardName }}</p>
                    </div>
                    <div class="col-2">
                        <input type="button" :class="btnEdit" :value="editText" v-on:click="changeCard(index)"/>
                    </div>
                </div>
                <cardList v-show="isShow" :card-data="cardData" :card-index="index" :card-selected="cardValue" v-on:change-card="UpdateCardValue"></cardList>
                <!-- <addCard></addCard> -->
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
export default {
    props:{
        item:{
            type:Object
        },
        cardItem:{
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
        'addCard' : addCard
    },
    data:function(){
        return {
             'selectItem':this.item,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger',
             'btnEdit' : 'btn btn-primary',
             'successText' : '啟用',
             'dangerText' : '停止',
             'editText' : '編輯',
             'isStatus' : this.item.status == '1',
             'isShow' : false
        }
    },
    computed: {
        cardName(){
            let cardKey = Object.keys(this.cardItem);
            if(this.item.card == cardKey[0]){
                return this.cardItem[cardKey[0]].cardName
            }
        },
        cardValue(){
            let cardKey = Object.keys(this.cardItem);
            if(this.item.card == cardKey[0]){
                return this.cardItem[cardKey[0]].last
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
        },
        UpdateCardValue(CardSelected) {
            if(CardSelected != ''){
                let cardKey = Object.keys(this.cardItem)
                this.cardItem[cardKey[0]].last = CardSelected
            }
            this.isShow = false
        }
    },
}
</script>>