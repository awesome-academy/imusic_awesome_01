new Vue({
    mixins: [mixin],
    el: '.content',
    data: {
        singers: [],
        pagination: {
            total: 0, 
            per_page: 2,
            from: 1, 
            to: 0,
            current_page: 1
          },
        offset: 4,
    },

    created: function(){
        this.getListSingers(this.pagination.current_page);
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    methods: {
        getListSingers(page) {
            var option = {
                method: 'GET',
                url: '/admin/singers?page='+page,
                json: true
            }
            axios(option).then((response) => {
                this.singers = response.data.data.data;
                this.pagination = response.data.pagination;
            }).catch((error) => {
                this.handleError(error.response.status);
            });
        },
        deleteSinger(id){
            var result = confirm('Bạn có muốn xóa không ?');
            if(!result) return false;
            var option = {
                method: 'DELETE',
                url: '/admin/singers/'+id,
            }
            axios(option).then(() => {
                this.getListSingers();
            }).catch((error) => {
                this.handleError(error.response.status);
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getListSingers(page);
        }
    }
});

