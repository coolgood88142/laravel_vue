<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnAdd" value="新增" v-on:click="addChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr v-for="(el,ListIndex) in channelList" :key="ListIndex">
                    <th>
                        <!-- <select v-model="modelData[index][ListIndex]" :name="selectData.elName" @change="getSubData(selectData.isMaster, ListIndex)">
                            <option value="" disabled selected>--請選擇--</option>
                            channelData的資料型態要改用select跑v-for組起來
                            達到不需要再額外組選項資料，可以自動對應  selectData.select
                            <option v-for="(data, index) in selectData.select" :key="index" :value="data.value">{{ data.text }}</option>
                        </select> -->
                        <select v-model="el[0]" @change="getSubData(ListIndex)">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(master, index) in channelMaster" :key="index" :value="master.value">{{ master.text }}</option>
                        </select>
                    </th>
                    <th>
                         <select v-model="el[1]">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(sub, index) in channelSub[masterSelected[ListIndex]]" :key="index" :value="sub.value">{{ sub.text }}</option>
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
        channelMaster:{
            type:Object
        },
        channelSub:{
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
            let master_selected = this.masterSelected
            let sub_selected = this.subSelected
            let data = []
            if(master_selected.length > 0 && sub_selected.length > 0 ){
                for(let i = 0; i < master_selected.length; i++){
                    data.push([master_selected[i], sub_selected[i]])
                }
            }
            return data
        },
        getSubData: function(index){
            if(index != undefined && index != null){
                this.masterSelected[index] = this.channelList[index][0]
                this.subSelected[index] = ''
            }
        },
        // getSubData: function(isMaster, index){
        //     if(isMaster){
        //         let master = document.getElementsByName('master[]')[index]
        //         let text = master.options[master.selectedIndex].text
        //         let data = this.channelData[text]
        //         let obj = Object.keys(data)
        //         let select = []
        //         obj.forEach(function(el,index){
        //             select.push({text:el, value:data[el]})
        //         })
                
        //         this.channelList[index][1].select = select
        //         this.modelData[1][index] = ''
        //     }
        // },
        addChannel: function(){
            this.channelList.push(['',''])
        },
        delChannel: function(index){
            this.channelList.splice(index,1)
        },

    }
}
</script>