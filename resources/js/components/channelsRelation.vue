<template>
    <div id="channel_list">
        <div style="text-align:right;margin-bottom: 20px;">
            <input type="button" id="add" :class="btnSelect" value="查詢" v-on:click="selectChannel()">
        </div>
        <div class="form-group">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>
                        <select>
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(master, index) in masterChannelsData" :key="index" :value="master.id">{{ master.name }}</option>
                        </select>
                    </th>
                    <th>
                        <select>
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(sub, index) in subChannelsData" :key="index" :value="sub.id">{{ sub.name }}</option>
                        </select>
                    </th>
                    <th>
                        <select>
                            <option value="" disabled selected>--請選擇--</option>
                            <option v-for="(el, index) in courseData" :key="index" :value="el.id">{{ el.title }}</option>
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
    },
    data:function(){
        return {
            // channelList: []
            btnSelect: 'btn btn-primary'
        }
    },
    mounted() {
        // this.channelList = this.getChannelData()
    },
    methods: {
        
    }
}
</script>