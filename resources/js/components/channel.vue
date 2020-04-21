<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnAdd" value="新增" v-on:click="addChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr v-for="(el,ListIndex) in channelList" :key="ListIndex">
                    <th v-for="(selectData,index) in el" :key="index">
                        <select v-model="modelData[index][ListIndex]" :name="selectData.elName" @change="getSubData(selectData.isMaster, ListIndex)">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(data, index) in selectData.select" :key="index" :value="data.value">{{ data.text }}</option>
                        </select>
                    </th>
                    <th>
                        <input type="button" :class="btnDelete" value="刪除" v-on:click="delChannel(ListIndex)">
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
        }
    },
    data:function(){
        return {
            //不應該這寫，當function或參數寫壞了，導致回傳資料錯誤變成null的話，畫面全壞，預設值的定義是一定是正常的資料型態
            channelList: [],
            btnAdd:'btn btn-primary',
            btnDelete:'btn btn-secondary',
            modelData: [this.masterSelected,this.subSelected],
            buttonData: {isSelect : false},
            isDafult: true,
            channelIindex:0
        }
    },
    computed: {
        // channelList(){
        //     return this.getChannelData()
        // },
        // channelIindex(){
        //     return this.channelList.length - 1
        // }
    },
    mounted() {
        this.channelList = this.getChannelData()
    },
    methods: {
        getChannelData :function(){
            let master_selected = this.modelData[0]
            let sub_selected = this.modelData[1]
            let data = []
            if(master_selected.length > 0 && sub_selected.length > 0 ){
                for(let i = 0; i < master_selected.length; i++){
                    //因為要選擇master選單後，才可以產生sub選單，所以要拆開寫
                    let master = this.getSelectData(this.channelData, i)
                    let sub = this.getSelectData(null, i)
                    data.push([master, sub])
                }
            }

            this.channelIindex = data.length - 1
            this.isDafult = false

            return data
        },
        getChannelList: function(index){
            return [this.getSelectData(this.channelData,index), this.getSelectData(null, index)]
        },
        getSelectData: function(channelData, count){
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
            }else{
                //當後端傳值有資料時，要組選項
                if(this.isDafult){
                    let channel = this.channelData
                    let obj = Object.keys(channel)
                    let master = this.modelData[0]
                    obj.forEach(function(el,index){
                        if(master[count] == index){
                            let sub_data = channel[el]
                            let sub = Object.keys(sub_data)
                            sub.forEach(function(el,index){
                                selectData.push({text:el, value:sub_data[el]})
                            })
                        }
                    });
                }
            }

            return {isMaster: isMaster, select: selectData, elName: elName}
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
                this.modelData[1][index] = ''
            }
        },
        addChannel: function(){
            this.channelIindex  = this.channelIindex + 1
            this.modelData[0][this.channelIindex] = ''
            this.modelData[1][this.channelIindex] = ''
            this.channelList.push(this.getChannelList(this.channelIindex))
        },
        delChannel: function(index){
            this.channelIindex  = this.channelIindex - 1
            this.modelData[0].splice(index,1)
            this.modelData[1].splice(index,1)
            this.channelList.splice(index,1)
        },

    }
}
</script>