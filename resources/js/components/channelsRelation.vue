<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnSelect" value="查詢" v-on:click="selectChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>
                        <select v-model="masterChannels" id="master" name="master" v-on:change="changeMasterChannels">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(master, index) in masterChannelsList" :key="index" :value="master.id">{{ master.name }}</option>
                        </select>
                    </th>
                    <th>
                        <select v-model="subChannels" id="sub" name="sub" v-on:change="changeSubChannels">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(sub, index) in subChannelsList" :key="index" :value="sub.id">{{ sub.name }}</option>
                        </select>
                    </th>
                    <th>
                        <select v-model="course" id="course" name="course">
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(el, index) in courseList" :key="index" :value="el.id">{{ el.title }}</option>
                        </select>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
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
        }
    },
    data:function(){
        return {
            masterChannelsList: this.masterChannelsData,
            subChannelsList: [],
            courseList: [],
            masterChannels: '',
            subChannels: '',
            course: '',
            btnSelect: 'btn btn-primary'
        }
    },
    methods: {
        changeMasterChannels: function () {
            if(this.relatedData.length > 0){
                for(let i = 0; i < this.relatedData.length; i++){
                    if(this.masterChannels == this.relatedData[i]['masterChannelsId']['id']){
                        this.subChannelsList = [this.relatedData[i]['subChannelsId']]
                        this.subChannels = this.relatedData[i]['subChannelsId']['id']
                        this.courseList = this.relatedData[i]['courseId']
                    }
                }
            }
        },
        changeSubChannels: function () {
            if(this.relatedData.length > 0){
                for(let i = 0; i < this.relatedData.length; i++){
                
                }
            }
        }
    }
}
</script>