<template>
	<div id="channel_list">
		<div style="text-align:right;margin-bottom: 20px;">
			<input type="button" id="add" :class="btnAdd" value="新增" v-on:click="addChannel()">
		</div>
		<div class="form-group">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<tr v-for="(el,ListIndex) in channelList" :key="ListIndex">
					<th>
						<select v-model="el[0]" @change="getSubData(ListIndex)" name="master[]">
							<option value="" disabled selected>--請選擇--</option>
							<option v-for="(master, index) in channelMaster" :key="index"
								:value="master.value">{{ master.text }}</option>
						</select>
					</th>
					<th>
						<select v-model="el[1]" name="sub[]">
							<option value="" disabled selected>--請選擇--</option>
							<option v-for="(sub, index) in channelSub[masterSelected[ListIndex]]"
								:key="index" :value="sub.value">{{ sub.text }}</option>
						</select>
					</th>
					<th>
						<input type="button" :class="btnDelete" value="刪除"
							v-on:click="delChannel(ListIndex)">
					</th>
				</tr>
			</table>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		channelMaster: {
			type: Array,
		},
		channelSub: {
			type: Array,
		},
		masterSelected: {
			type: Array,
		},
		subSelected: {
			type: Array,
		},
	},
	data() {
		return {
			channelList: [],
			btnAdd: "btn btn-primary",
			btnDelete: "btn btn-secondary",
			buttonData: { isSelect: false },
		}
	},
	mounted() {
		this.channelList = this.getChannelData()
	},
	methods: {
		getChannelData() {
			const masterselected = this.masterSelected
			const subselected = this.subSelected
			const data = []
			if (masterselected.length > 0 && subselected.length > 0) {
				for (let i = 0; i < masterselected.length; i++) {
					data.push([masterselected[i], subselected[i]])
				}
			}
			return data
		},
		getSubData(index) {
			if (index !== undefined && index !== null) {
				this.channelList[index][1] = ""
				this.masterSelected[index] = this.channelList[index][0]
				this.subSelected[index] = this.channelList[index][1]
			}
		},
		addChannel() {
			this.channelList.push(["", ""])
		},
		delChannel(index) {
			this.channelList.splice(index, 1)
		},
	},
}
</script>
