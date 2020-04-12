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
        isDafult:{
            type:Boolean
        }
    },
    data:function(){
        return {
            nowChannel:0,
            channelList: this.getChannelData(this.masterSelected, this.subSelected),
            btnAdd:'btn btn-primary',
            btnDelete:'btn btn-secondary',
            modelData: [this.masterSelected,this.subSelected],
            modelName: [this.masterModel,this.subModel],
            buttonData: {isSelect : false},
            dafultData: this.isDafult
        }
    },
    mounted() {
        this.setSubData(this.dafultData, this.masterSelected)
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
                    this.nowChannel = i+1
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
                if(!this.dafultData){
                    this.modelData[1][index] = ''
                }
            }else{
                let sub = document.getElementsByName('sub[]')[index]
            }
            // $emit('sendData', { index:index, master: masterValue, sub: subValue })
        },
        addChannel: function(){
            this.dafultData = false
            this.nowChannel = this.nowChannel+1
            this.channelList.push(this.getChannelList(this.nowChannel))
            this.modelData[0][this.nowChannel] = ''
            this.modelData[1][this.nowChannel] = ''
            this.updateModelData()
        },
        delChannel: function(index){
            this.dafultData = false
            let master_value = document.getElementsByName('master[]')[index].value
            let sub_value = document.getElementsByName('sub[]')[index].value
            this.channelList.splice(index,1)
            this.nowChannel = this.nowChannel-1
            this.modelData[0].splice(index,1)
            this.modelData[1].splice(index,1)
            this.modelName[0].splice(index,1)
            this.modelName[1].splice(index,1)
            this.updateModelData()

            // $emit('delelteData', index)
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