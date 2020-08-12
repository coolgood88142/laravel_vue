<template>
    <!-- <form>
        <div class="form-group">
            <div class="card">
                <div class="card-body">
                    <div class="form-check">
                        <label for="newCardNumber">新增信用卡</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="cancel" name="cancel" value="取消" >
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="save" name="save" value="儲存" >
                    </div>
                </div>
            </div>
        </div>
    </form> -->
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  新增信用卡
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    <div class="form-group">
                        <label for="cardName">輸入信用卡名稱</label>
                        <input type="text" class="form-control" id="cardName">
                   </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                    <div class="form-check form-check-inline">
                        -
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="text" class="form-control" size="4">
                    </div>
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="cancel" name="cancel" value="取消" @click="$emit('close')">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="button" class="btn btn-primary" id="save" name="save" value="儲存" >
                    </div>
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
</template>

<script>
export default {
    props:{
        // showModal:{
        //     type:Boolean
        // }
    },
    data:function(){
        return {

        }
    },
    methods: {
        
    }
}
</script>>