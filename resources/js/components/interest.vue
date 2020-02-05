<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ interestText }}</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox0" value="0">
            <label class="form-check-label" for="inlineCheckbox0">運動</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
            <label class="form-check-label" for="inlineCheckbox1">上網</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2">
            <label class="form-check-label" for="inlineCheckbox2">其他</label>
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