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
                        <input type="button" class="btn btn-primary" id="send" name="send" value="送出" @click="$emit('change-card', selectedData)">
                        <!--要再多傳一個物件回來，更換信用卡資訊-->
                        <!--1.信用卡名稱送出實沒更換
                            2.選擇信用卡後沒送出，不會做重置
                            3.商品卡面要有間距
                            4.新增功能(彈跳視窗)，新增信用卡之後，商品的信用卡資訊要選到以及隱藏編輯，最上方也要更新信用卡資訊-->
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
        },
        isShow:{
            type:Boolean
        }
    },
    data:function(){
        return {
             'cardIndexData' : [],
             'cardAllData' : [],
             'cardLastData' : '',
             'selected' : this.cardSelected,
             'btnSuccess' : 'btn btn-success',
             'btnDanger' : 'btn btn-danger',
             'isUpdate' : this.isEdit
        }
    },
    mounted() {
        let cardIdArray = []
        let cardName = 'cardname'
        let length = this.cardData.length
        for (let i = 0; i < length; i++) {
            let id = cardName + i
            cardIdArray.push(id)
        }
        this.cardIndexData = cardIdArray
        this.cardLastData = cardName + length
        
        let cardArray = []
        this.cardData.forEach(function(el){
            let cardKey = Object.keys(el);
            cardArray.push(el[cardKey])
        })
       this.cardAllData = cardArray
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