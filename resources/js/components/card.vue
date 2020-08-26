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
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-8">
                        <p class="card-text">信用卡名稱：{{ cardName }}</p>
                    </div>
                    <div v-show="isEdit" class="col-2">
                        <input type="button" :class="btnEdit" :value="editText" v-on:click="changeCard()"/>
                    </div>
                </div>
                <cardList :is-show="isShow" :card-data="cardData" :card-index="index" :card-selected="cardSelected" v-on:change-card="updateCardValue" v-on:send-card-obj="sendNewCard"></cardList>
                <input type="button" :class="isStatus ? btnDanger : btnSuccess" :disabled="isDisabled" :value="isStatus ? dangerText : successText" v-on:click="changeStatus(selectItem.status)"/>
                <!--排版改用3列，cardList放最上面，停止功能改用只顯示商品、價錢、文字(是否已啟用?)、啟用按鈕-->
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import cardList from './cardList.vue';
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
        'cardList': cardList
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
             'isShow' : false,
             'isStatus' : this.item.status == '1',
             'isEdit' : this.item.status == '1',
             'messageText' : '',
             'isDisabled' : false
        }
    },
    computed: {
        itemData(){
            let item = ""
            let select = this.selectItem
            _.forEach(this.cardData, function (value, key) {
                _.mapKeys(value, function(card, cardkey){
                    if(select.card == cardkey){
                        item = value
                    }
                })
            })
            this.isDisabled = false
            return item
        },
        cardName(){
            let name = ''
            let itemData = this.itemData
            let item = this.item
            _.mapKeys(itemData, function(card, cardkey){
                if(item.card == cardkey){
                    name = itemData[cardkey].cardName
                }
            })

            if(name == ''){
                name = '未綁卡'
                this.isEdit = true
                this.isDisabled = true
            }

            return name
        },
        cardSelected(){
            let itemData = this.itemData
            let item = this.item
            let selected = ''
            _.mapKeys(itemData, function(card, cardkey){
                if(item.card == cardkey){
                    selected =  itemData[cardkey].last
                }
            })

            return selected
        }
    },
    methods: {
        changeStatus(status){
            if(status == '0'){
                this.item.status = '1'
                this.isStatus = true
                this.isEdit = true
            }else{
                this.item.status = '0'
                this.isStatus = false
                this.isEdit = false
            }
            this.$emit('update-card')
        },
        getCardItem(){
            let itemData = this.itemData
            let item = this.item
            _.mapKeys(itemData, function(card, cardkey){
                if(item.card == cardkey){
                   return itemData[cardkey]
                }
            })
        },
        changeCard(){
            if(this.isShow){
                this.isShow = false
            }else{
                this.isShow = true
            }
        },
        updateCardValue(CardObj) {
            if(CardObj != ''){
                let key = ''
                let isShow = ''
                _.mapKeys(CardObj, function(card, cardkey){
                    key = cardkey
                    isShow = false
                })

                if(!this.isStatus){
                    this.isEdit = false
                }

                this.selectItem.card = key
                this.isShow = isShow
                this.$emit('update-card')
            }
        },
        sendNewCard(CardObj){
            //若切換或新增信用卡時，判斷商品是否停用，停用就不顯示可以編輯
            if(!this.isStatus){
                this.isEdit = false
            }
            this.$emit('save-new-card', CardObj, this.index)
        }
    }
}
</script>>