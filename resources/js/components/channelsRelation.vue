<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnSelect" value="查詢" v-on:click="selectChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>主頻道</th>
                    <th>次頻道</th>
                    <th>課程</th>
                </tr>
                <tr>
                    <th>
                        <vSelect v-model="masterChannels" :options="masterChannelsList" :searchable="true" value="id" label="name" @input="changeMasterChannels"></vSelect>
                    </th>
                    <th>
                        <vSelect v-model="subChannels" :options="subChannelsList" :searchable="true" value="id" label="name" @input="changeSubChannels"></vSelect>
                    </th>
                    <th>
                        <vSelect v-model="course" :options="courseList" :searchable="true" value="id" label="name"></vSelect>
                    </th>
                    <th>
                    </th>
                </tr>
            </table>
        </div>
        <!-- <div class="form-group" id="select">
            <table class="table table-striped table-bordered" style="width:100%">
                <tr>
                </tr>
            </table>
        </div> -->
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css'
import vSelect from 'vue-select'
Vue.component('vSelect', vSelect)
let defaultLable = {'id': 0, 'name': '---請選擇---'}
export default {
    props:{
        masterChannelsData:{
            type:Array
        },
        subChannelsData:{
            type:Array
        },
        courseData:{
            type:Array
        },
        relatedData:{
            type:Array
        },searchable: {
	type: Boolean,
	default: true
},
    },
    data:function(){
        return {
            masterChannelsList: this.masterChannelsData,
            subChannelsList: [],
            courseList: [],
            masterChannels: defaultLable,
            subChannels: defaultLable,
            course: defaultLable,
            btnSelect: 'btn btn-primary'
        }
    },
    mounted(){
        this.masterChannelsList = this.getDeaultOptions(this.masterChannelsList)
        this.subChannelsList = this.getDeaultOptions(this.subChannelsList)
        this.courseList = this.getDeaultOptions(this.courseList)
    },
    methods: {
        getDeaultOptions: function(data){
            let index = data.length
            let options = [defaultLable]
            for(let i = 0; i < index; i++){
                options.push(data[i])
            }
            return options
        },
        changeMasterChannels: function () {
            if(this.relatedData.length > 0){
                for(let i = 0; i < this.relatedData.length; i++){
                    if(this.masterChannels['id'] == this.relatedData[i]['masterChannelsId']['id']){
                        this.subChannelsList = this.relatedData[i]['subChannelsId']
                        this.subChannels = defaultLable
                        this.courseList = []
                        this.course = defaultLable
                    }
                }
            }
        },
        changeSubChannels: function () {
            this.courseList = []
            if(this.relatedData.length > 0){
                for(let i = 0; i < this.relatedData.length; i++){
                    let subChannelsId = this.relatedData[i]['subChannelsId'];
                    for(let j =0; j < subChannelsId.length; j++){
                        if(this.subChannels['id'] == subChannelsId[j]['id']){
                            this.courseList = this.relatedData[i]['courseId'][j]
                            this.course = defaultLable
                        }
                    }
                }
            }
        }
    }
}
</script>