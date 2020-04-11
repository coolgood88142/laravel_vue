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
                            <select v-model="selectData.modelName" :name="selectData.elName" @change="getSubData(selectData.isMaster, ListIndex)">
                                <option value="" disabled selected>--請選擇--</option>
                                <option v-for="(data, index) in selectData.select" :key="index" :value="data">{{ data }}</option>
                            </select>
                        </div>
                        <div v-else>
                            <input type="button" :class="btnDelete" value="刪除" v-on:click="delChannel(ListIndex)">
                        </div>
                    </th>
                </tr>
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
        masterData:{
            type:Array
        },
        subData:{
            type:Array
        }
    },
    data:function(){
        return {
            nowChannel:0,
            channelList: this.getChannelData(this.masterSelected, this.subSelected),
            masterValue: this.masterData,
            // subValue: Array(this.nowChannel).fill(''),
            btnAdd:'btn btn-primary',
            btnDelete:'btn btn-secondary',
        }
    },
    methods: {
        getChannelData :function(masterSelected, subSelected){
            let data = []
            if(masterSelected != undefined && subSelected != undefined){
                let length = masterSelected.length
                for(let i = 0; i<length; i++){
                    data.push(this.getChannelList(i))
                }
            }else{
                data.push(this.getChannelList(this.nowChannel))
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
            let modelName = 'sub'+index
            if(channelData != undefined && channelData != null){
                isMaster = true
                elName = 'master[]'
                modelName = 'master'+index
                let data = Object.keys(channelData)
                data.forEach(function(el){
                    selectData.push(el)
                });
            }
            this.nowChannel = this.nowChannel+1
            
            return {isSelect : true, isMaster: isMaster, select: selectData, elName: elName, modelName: modelName}
        },
        getSubData: function(isMaster, index){
            if(isMaster){
                let master = document.getElementsByName('master[]')[index]
                let text = master.options[master.selectedIndex].text
                this.channelList[index][1].select = this.channelData[text]
            }else{
                let sub = document.getElementsByName('sub[]')[index]
            }

            // $emit('sendData', { index:index, master: masterValue, sub: subValue })
        },
        addChannel: function(){
            this.channelList.push(this.getChannelList(this.nowChannel))
        },
        delChannel: function(index){
            let master_value = document.getElementsByName('master[]')[index].value
            let sub_value = document.getElementsByName('sub[]')[index].value
            this.channelList.splice(index,1)
            this.nowChannel = this.nowChannel-1
            // this.updateChannelDataIndex()
            // $emit('delelteData', index)
        },
        updateChannelDataIndex: function(){
            let length = this.channelList.length
            for(let i = 0; i<length; i++){
                for(let j = 0; j<3; j++){
                    this.channelList[i][j].index = i
                }
            }
        }
    },
    watch:{
        masterValue(newVal){
            if(this.masterData != undefined){
                this.masterData.forEach(function(el,index){
                    console.log(el)
                })

            }
            
            
        }
    }
}
</script>