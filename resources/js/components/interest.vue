<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="interest1" value="0">
            <label class="form-check-label" for="interest1">運動</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="interest2" value="1">
            <label class="form-check-label" for="interest2">上網</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="interest3" value="2">
            <label class="form-check-label" for="interest3">其他</label>
        </div>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            interestText: '興趣(複)'
        }
    }
}
</script>>