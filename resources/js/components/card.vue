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
                    <div class="col-2">
                        <input type="button" :class="btnEdit" :value="editText" v-on:click="changeCard()"/>
                    </div>
                </div>
                <cardSelect :is-show="isShow" :card-data="cardData" :card-index="index" :card-selected="cardSelected" v-on:save-card="saveCard"></cardSelect>
                <input type="button" :class="isStatus ? btnDanger : btnSuccess" :disabled="isDisabled" :value="isStatus ? dangerText : successText" v-on:click="changeStatus(selectItem.status)"/>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import cardSelect from './cardSelect.vue';
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
        'cardSelect': cardSelect
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
             'messageText' : '',
             'isDisabled' : false
        }
    },
    computed: {
        itemData(){
            let select = this.selectItem
            let item = _.find(this.cardData, select.card)
            this.isDisabled = false
            return item
        },
        cardName(){
            let itemData = this.itemData
            let item = this.item
            let key = _.findKey(itemData, function(e, key) { return key == item.card; })
            let name = (key == undefined || key == null) ? '' : itemData[key].cardName

            if(name == ''){
                name = '未綁卡'
                this.isDisabled = true
            }

            return name
        },
        cardSelected(){
            let itemData = this.itemData
            let item = this.item
            let key = _.findKey(itemData, function(e, key) { return key == item.card; })
            let selected = (key == undefined || key == null) ? '' : itemData[key].last

            return selected
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
        saveCard(CardObj){
            this.isShow = false
            if(CardObj != 'add'){
                let key = ''
                _.mapKeys(CardObj, function(card, cardkey){
                    key = cardkey
                })

                this.selectItem.card = key
            }else{
                 this.$emit('save-new-card', CardObj, this.index)
            }
        }
    }
}
</script>>