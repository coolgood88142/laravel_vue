<template>
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  <h3>新增信用卡</h3>
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    <div class="form-group">
                        <label for="cardName">輸入信用卡名稱</label>
                        <input type="text" v-model="cardName" class="form-control" id="cardName">
                   </div>
                    <div class="form-check form-check-inline">
                        <input type="text" v-model="card1"  class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" v-model="card2" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" v-model="card3" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" v-model="card4" class="form-control" size="4">
                    </div>
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="cancel" name="cancel" value="取消" @click="$emit('close')">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="save" name="save" value="儲存" @click="$emit('send-card', cardData)">
                    </div>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
</template>

<script>
export default {
    computed: {
        cardData(){
            let obj = new Object()
            obj.cardName = this.cardName
            obj.full = this.card1 + "-" + this.card2 + "-" + this.card3 + "-" + this.card4
            obj.last = this.card4
            obj.first = this.card1
            
            return obj
        }
        
    },
    data:function(){
        return {
            'cardName' : '',
            'card1' : '',
            'card2' : '',
            'card3' : '',
            'card4' : ''
        }
    }
}
</script>>