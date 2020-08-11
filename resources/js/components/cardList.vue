<template>
    <form>
        <div class="form-group row">
            <div class="card">
                <div class="card-body">
                    <div class="col" v-for="(card, index) in cardData" :key="index">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="selected" name="cardname" :id="card.cardId" :value="card.cardValue">
                            <label class="form-check-label" :for="card.cardId" >
                                {{ card.cardName }}:{{ card.cardNumber }}
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="selected" name="cardname" :id="cardLastIndex" value="">
                            <label class="form-check-label" :for="cardLastIndex">
                                新增信用卡
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-primary" id="send" name="send" value="送出" @click="$emit('change-card', selected)">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
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
        }
    },
    data:function(){
        return {
             'cardDataLength' : this.cardData.length,
             'cardLastIndex' : '',
             'selected' : this.cardSelected,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger'
        }
    },
    mounted() {
        this.cardLastIndex = this.cardDataLength
    },
    methods: {
        saveCardData(){
            let selected = this.selected
        }
    },
}
</script>>