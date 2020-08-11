<template>
    <form>
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
    </form>
</template>

<script>
export default {
    props:{

    },
    data:function(){
        return {

        }
    },
    methods: {
        
    }
}
</script>>