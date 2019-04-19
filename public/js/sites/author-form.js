new Vue({
    mixins: [mixin],
    el: '.content',
    data: window.data,

    watch: {
        'author.name': function() {
            if(this.formErrors && this.formErrors.name) this.formErrors.name = null;
        },
    },

    methods: {
        saveSinger(){
            var self = this;
            var option = {
                method: 'POST',
                url: '/admin/authors',
                params: this.author,
                json: true
            } 
            if (this.id) {
                option = {
                    method: 'PATCH',
                    url: '/admin/authors/'+ this.id,
                    params: this.author,
                    json: true
                }
            }

            axios(option).then(() => {
                self.formError = null
                window.location.href = '/admin/authors';
            }).catch((error) => {
                self.formErrors = error.response.data.errors;
                if (error.response.status == 422) {
                    self.authorNotFound = error.response.data.message;
                    return false;
                }

                this.handleError(error.response.status);
            });
        }
    }
});
