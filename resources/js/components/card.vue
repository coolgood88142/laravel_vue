<template>
    <td>
        <div class="card" style="width: 18rem; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">商品：{{ cardData.name }}</p>
                <p class="card-text">價錢：{{ cardData.price }}</p>
                <p v-show="isStatus" class="card-text">卡號末四碼：{{ cardValue }}</p>
                <p class="card-text">刷卡時間：{{ cardData.datetime }}</p>
                <input type="button" :class="isStatus ? btnDanger : btnSuccess" :value="isStatus ? dangerText : successText" v-on:click="changeStatus(cardData.status)"/>
            </div>
        </div>
    </td>
</template>

<script>
export default {
    props:{
        item:{
            type:Object
        },
        cardItem:{
            type:Object
        }
    },
    data:function(){
        return {
             'cardData':this.item,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger',
             'successText' : '啟用',
             'dangerText' : '停止',
             'isStatus' : this.item.status == '1'
        }
    },
    computed: {
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
        }
    },
}
</script>>