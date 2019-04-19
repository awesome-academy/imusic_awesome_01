new Vue({
    mixins: [mixin],
    el: '.content',
    data: window.data,

    watch: {
        'category.name': function() {
            if(this.formErrors && this.formErrors.name) this.formErrors.name = null;
        },
    },

    methods: {
        saveSinger(){
            var self = this;
            var option = {
                method: 'POST',
                url: '/admin/categories',
                params: this.category,
                json: true
            } 
            if (this.id) {
                option = {
                    method: 'PATCH',
                    url: '/admin/categories/'+ this.id,
                    params: this.category,
                    json: true
                }
            }

            axios(option).then(() => {
                self.formError = null
                window.location.href = '/admin/categories';
            }).catch((error) => {
                self.formErrors = error.response.data.errors;
                if (error.response.status == 422) {
                    self.categoryNotFound = error.response.data.message;
                    return false;
                }

                this.handleError(error.response.status);
            });
        }
    }
});
