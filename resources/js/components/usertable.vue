<template>
    <table class="table table-bordered">
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th width="200px">Action</th>
			</tr>
			<tr v-for="(item, index) in items" :key="index">
				<td>{{ item.title }}</td>
				<td>{{ item.description }}</td>
				<td>	
			      <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
			      <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
				</td>
			</tr>
		</table>

        <nav>
	        <ul class="pagination">
	            <li v-if="pagination.current_page > 1">
	                <a href="#" aria-label="Previous"
	                   @click.prevent="changePage(pagination.current_page - 1)">
	                    <span aria-hidden="true">«</span>
	                </a>
	            </li>
	            <li v-for="page in pagesNumber"
	                v-bind:class="[ page == isActived ? 'active' : '']">
	                <a href="#"
	                   @click.prevent="changePage(page)">@{{ page }}</a>
	            </li>
	            <li v-if="pagination.current_page < pagination.last_page">
	                <a href="#" aria-label="Next"
	                   @click.prevent="changePage(pagination.current_page + 1)">
	                    <span aria-hidden="true">»</span>
	                </a>
	            </li>
	        </ul>
	    </nav>
</template>

<script>
import verification from './mixins/verification.js';

export default {
    mixins: [verification],
    data:function(){
        return {
            current_page:5
        }
    },
    created:{
        getUserData(current_page)
    },
    methods:{
        getUserData:function(page){
            this.$http.get('/user?page='+page).then((response) => {
            this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
          });
        }
    }
}
</script>