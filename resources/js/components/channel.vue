<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnAdd" value="新增" v-on:click="addChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr v-for="(el,ListIndex) in channelList" :key="ListIndex">
                    <th v-for="(selectData,index) in el" :key="index">
                        <div v-if="selectData.isSelect">
                            <select v-model="modelData[index][ListIndex]" :name="selectData.elName" @change="getSubData(selectData.isMaster, ListIndex)">
                                <option value="" disabled selected>--請選擇--</option>
                                <option v-for="(data, index) in selectData.select" :key="index" :value="data.value">{{ data.text }}</option>
                            </select>
                        </div>
                        <div v-else>
                            <input type="button" :class="btnDelete" value="刪除" v-on:click="delChannel(ListIndex)">
                        </div>
                    </th>
                </tr>
                <!-- 這個不需要直接在新增與刪除去計算目前有多少組資料就可以了-->
                <input type="hidden" v-model="nowChannelCount" name="channelIndex">
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        channelData:{
            type:Object
        },
        masterSelected:{
            type:Array
        },
        subSelected:{
            type:Array
        },
        masterModel:{
            type:Array
        },
        subModel:{
            type:Array
        },
        channelIndex:{
            type:Number
        }
    },
    data:function(){
        return {
            nowChannelCount: this.channelIndex,
            //不應該這寫，當function或參數寫壞了，導致回傳資料錯誤變成null的話，畫面全壞，預設值的定義是一定是正常的資料型態
            channelList: this.getChannelData(this.masterSelected, this.subSelected),
            btnAdd:'btn btn-primary',
            btnDelete:'btn btn-secondary',
            modelData: [this.masterSelected,this.subSelected],
            modelName: [this.masterModel,this.subModel],
            buttonData: {isSelect : false},
            isDafult: true
        }
    },
    mounted() {
        this.setSubData(this.isDafult, this.masterSelected)
    },
    methods: {
        setSubData: function(isDafult, masterSelected) {
            if(isDafult){
                for(let i = 0; i < masterSelected.length; i++){
                    this.getSubData(true,i)
                }
            }
        },
        getChannelData :function(masterSelected, subSelected){
            let data = []
            if(masterSelected.length > 0 && subSelected.length > 0 ){
                for(let i = 0; i < masterSelected.length; i++){
                    //因為要選擇master選單後，才可以產生sub選單，所以要拆開寫
                    let master = this.getSelectData(this.channelData, i)
                    let sub = this.getSelectData(null, i)
                    data.push([master, sub, {isSelect : false}])
                    this.nowChannelCount = i+1
                }
            }

            return data
        },
        getChannelList: function(index){
            return [this.getSelectData(this.channelData,index), this.getSelectData(null, index), {isSelect : false}]
        },
        getSelectData: function(channelData, index){
            let selectData = []
            let isMaster = false
            let elName = 'sub[]'
            if(channelData != undefined && channelData != null){
                isMaster = true
                elName = 'master[]'
                let data = Object.keys(channelData)
                data.forEach(function(el,index){
                    selectData.push({text:el, value:index})
                });
                this.masterModel[index] = 'master' + index
            }else{
                this.subModel[index] = 'sub' + index
            }

            return {isSelect : true, isMaster: isMaster, select: selectData, elName: elName}
        },
        getSubData: function(isMaster, index){
            if(isMaster){
                let master = document.getElementsByName('master[]')[index]
                let text = master.options[master.selectedIndex].text
                let data = this.channelData[text]
                let obj = Object.keys(data)
                let select = []
                obj.forEach(function(el,index){
                    select.push({text:el, value:data[el]})
                })
                
                this.channelList[index][1].select = select
                if(!this.isDafult){
                    this.modelData[1][index] = ''
                }
            }
        },
        addChannel: function(){
            this.isDafult = false
            this.nowChannelCount = this.nowChannelCount+1
            this.channelList.push(this.getChannelList(this.nowChannelCount))
            this.modelData[0][this.nowChannelCount] = ''
            this.modelData[1][this.nowChannelCount] = ''
        },
        delChannel: function(index){
            this.isDafult = false
            let master_value = document.getElementsByName('master[]')[index].value
            let sub_value = document.getElementsByName('sub[]')[index].value
            this.channelList.splice(index,1)
            this.modelData[0].splice(index,1)
            this.modelData[1].splice(index,1)
            this.masterModel.splice(index,1)
            this.subModel.splice(index,1)
            // this.modelName[0].splice(index,1)
            // this.modelName[1].splice(index,1)
            this.updateModelData()
            this.nowChannelCount = this.nowChannelCount-1
        },
        updateModelData: function(){
            let master = []
            let sub = []
            this.masterModel.forEach(function(el,index){
                master.push('master' + index)
            })

            this.subModel.forEach(function(el,index){
                sub.push('sub' + index)
            })

            this.modelName[0] = master
            this.modelName[1] = sub
        }
    }
}
</script>