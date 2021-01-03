<template>
		<div id="channel_list">
				<div style="text-align:right;margin-bottom: 20px;">
				<input type="button" id="add" :class="btnSelect" value="查詢"
						v-on:click="showSelectChannels()">
				</div>
				<div class="form-group">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
						<tr>
						<th>主頻道</th>
						<th>次頻道</th>
						<th>課程</th>
						</tr>
						<tr>
						<th class="channels-width">
								<vSelect v-model="masterChannels" :options="masterChannelsList"
										:searchable="true" value="id" label="name"
										@input="changeMasterChannels">
										<span slot="no-options"></span>
								</vSelect>
						</th>
						<th class="channels-width">
								<vSelect v-model="subChannels" :options="subChannelsList"
										:searchable="true" value="id" label="name" @input="changeSubChannels">
										<span slot="no-options"></span>
								</vSelect>
						</th>
						<th class="channels-width">
								<vSelect v-model="course" :options="courseList"
										:searchable="true" value="id" label="name">
										<span slot="no-options"></span>
								</vSelect>
						</th>
						</tr>
				</table>
				<vSelect v-model="searchData" label="name" :options="channelsData"
						:filterable="false" @search="onSearch" @input="changeSearch">
						<span slot="no-options"></span>
				</vSelect>
				</div>
				<div class="form-group" id="select">
				<table class="table table-striped table-bordered" style="width:100%">
						<tr>
						<th>主頻道</th>
						<th>次頻道</th>
						<th>課程</th>
						</tr>
						<tr v-for="(channels, index) in selectChannels" :key="index">
						<th>{{ channels[0] }}</th>
						<th>{{ channels[1] }}</th>
						<th>{{ channels[2] }}</th>
						</tr>
				</table>
				</div>
		</div>
</template>

<style>
		.channels-width{
				width:30%
		}
</style>

<script>
import "vue-select/dist/vue-select.css"
import vSelect from "vue-select"
Vue.component("vSelect", vSelect)
let defaultLable = {"id": 0, "name": "---請選擇---"}

export default {
	props: {
		masterChannelsData: {
			type: Array,
		},
		subChannelsData: {
			type: Array,
		},
		courseData: {
			type: Array,
		},
		relatedData: {
			type: Array,
		},
		totalChannelsData: {
			type: Array,
		},
	},
	data() {
		return {
			masterChannelsList: this.masterChannelsData,
			subChannelsList: [],
			courseList: [],
			selectChannels: [],
			channelsData: [],
			masterChannels: defaultLable,
			subChannels: defaultLable,
			course: defaultLable,
			searchChannels: defaultLable,
			btnSelect: "btn btn-primary",
			searchData: "",
		}
	},
	mounted() {
		this.masterChannelsList = this.getDeaultOptions(this.masterChannelsList)
		this.subChannelsList = this.getDeaultOptions(this.subChannelsList)
		this.courseList = this.getDeaultOptions(this.courseList)
	},
	methods: {
		getDeaultOptions(data) {
			const index = data.length
			const options = [defaultLable]
			for (let i = 0; i < index; i += 1) {
				options.push(data[i])
			}
			return options
		},
		changeMasterChannels() {
			if (this.relatedData.length > 0) {
				for (let i = 0; i < this.relatedData.length; i += 1) {
					if (this.masterChannels.id === this.relatedData[i].masterChannelsId.id) {
						this.subChannelsList = this.relatedData[i].subChannelsId
						this.subChannels = defaultLable
						this.courseList = []
						this.course = defaultLable
					}
				}
			}
		},
		changeSubChannels() {
			this.courseList = []
			if (this.relatedData.length > 0) {
				for (let i = 0; i < this.relatedData.length; i += 1) {
					const subChannelsId = this.relatedData[i].subChannelsId
					for (let j = 0; j < subChannelsId.length; j += 1) {
						if (this.subChannels.id === subChannelsId[j].id) {
							this.courseList = this.relatedData[i].courseId[j]
							this.course = defaultLable
						}
					}
				}
			}
		},
		showSelectChannels() {
			const selectData = []
			const masterData = []
			const subData = []
			const courseData = []

			if (this.masterChannels.id !== 0 && this.subChannels.id !== 0 && this.course.id !== 0) {
				this.selectData.push([this.masterChannels.name, this.subChannels.name, this.course.name])
			} else {
				if (this.masterChannels.id !== 0) {
					this.masterData.push(this.masterChannels)
				} else {
					this.masterData = this.masterChannelsList
				}

				if (this.subChannels.id !== 0) {
					this.subData.push(this.subChannels)
				} else {
					this.subData = this.subChannelsList
				}

				if (this.course.id !== 0) {
					this.courseData.push(this.course)
				} else {
					let list = []
					for (let i = 0; i < this.relatedData.length; i += 1) {
						const subChannelsId = this.relatedData[i].subChannelsId
						for (let j = 0; j < subChannelsId.length; j += 1) {
							if (subChannelsId[j].id === subData[0].id) {
								list = this.relatedData[i]["courseId"][j]
							}
						}
					}
					this.courseData = list
				}

				for (let i = 0; i < masterData.length; i += 1) {
					for (let j = 0; j < subData.length; j += 1) {
						for (let k = 0; k < courseData.length; k += 1) {
							selectData.push([masterData[i].name, subData[j].name, courseData[k].name])
						}
					}
				}
			}
			this.selectChannels = selectData
		},
		changeSearch() {
			const selectData = []
			if (this.relatedData.length > 0) {
				for (let i = 0; i < this.relatedData.length; i += 1) {
					const courseData = this.relatedData[i]["courseId"][0]
					for (let j = 0; j < courseData.length; j += 1) {
						if (courseData[j].name === this.searchData) {
							const master = this.relatedData[i].masterChannelsId
							const sub = this.relatedData[i].subChannelsId

							for (let k = 0; k < sub.length; k += 1) {
								this.selectData.push([master.name, sub[k].name, courseData[j].name])
							}
						}
					}
				}
			}
			this.selectChannels = selectData
		},
		onSearch(search, loading) {
			loading(true)
			this.search(loading, search, this)
		},
		search: _.debounce((loading, search, vm) => {
			fetch(
				`http://127.0.0.1:8000/getKeyWord?search=${search}`,
			).then(res => {
				res.json().then(json => (vm.channelsData = json.searchData))
				loading(false)
			})
		}, 350)
	}
}

</script>
