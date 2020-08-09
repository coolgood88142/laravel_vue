<template>
    <div class="card" style="width: 18rem; height: 300px;">
        <div class="card-body">
            <div class="form-check" v-for="(card, index) in cardData" :key="index">
                <input class="form-check-input" type="radio" name="cardname" id="cardname" :value="card.last">
                <label class="form-check-label" for="cardname">
                    {{ card.cardName }}:{{ card.full }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cardname" id="cardname" value="">
                <label class="form-check-label" for="cardname">
                    Add Card信用卡
                </label>
            </div>
        </div>
        <input type="button" id="send" name="send" value="送出" V-on:click="saveCardData()">
    </div>
</template>

<script>
export default {
    props:{
        selectedCard:{
            type:Object
        },
        cardData:{
            type:Array
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