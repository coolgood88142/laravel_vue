<html>
    <div id="btn">
        @{{ message }}
        <div v-for="(data, index) in namelist">
            <p>@{{ data.id }}</p>
            <p>@{{ data.name }}</p>
            <button v-if="!data.status" v-on:click="ShowAdd(index, true)">新增</button>
            <button v-if="data.status" v-on:click="ShowAdd(index, false)">刪除</button>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/button.js')}}"></script>
</html>