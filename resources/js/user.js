let user = new Vue({
    el: '#user',
    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        newItem: { 'title': '', 'description': '' },
    },
    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    ready: function () {
        this.getUserData(this.pagination.current_page);
    },
    methods: {
        getUserData: function (page) {
            this.$http.get('/user').then((response) => {
                this.$set('user', response.data.user);
            });
        },
        createItem: function () {
            var input = this.newItem;
            this.$http.post('/user', input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = { 'title': '', 'description': '' };
                $("#create-item").modal('hide');
                // toastr.success('Item Created Successfully.', 'Success Alert', { timeOut: 5000 });
            }, (response) => {
                this.formErrors = response.data;
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getUserData(page);
        }
    }
})