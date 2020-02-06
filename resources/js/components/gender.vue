<template>
    <div class="form-group">
        <h3 class="text-black font-weight-bold">{{ genderText }}</h3>
        <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="us_gender1" id="us_gender1" value="R" checked>
            <label class="form-check-label" for="us_gender1">男</label>
         </div>
         <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="us_gender2" id="us_gender2" value="S">
             <label class="form-check-label" for="us_gender2">女</label>
         </div>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            genderText: '性別'
        }
    }
}
</script>>