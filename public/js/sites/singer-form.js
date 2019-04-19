new Vue({
    mixins: [mixin],
    el: '.content',
    data: window.data,

    watch: {
        'singer.name': function() {
            if(this.formErrors && this.formErrors.name) this.formErrors.name = null;
        },
    },

    methods: {
        saveSinger(){
            var self = this;
            var option = {
                method: 'POST',
                url: '/admin/singers',
                params: this.singer,
                json: true
            } 
            if (this.id) {
                option = {
                    method: 'PATCH',
                    url: '/admin/singers/'+ this.id,
                    params: this.singer,
                    json: true
                }
            }

            axios(option).then(() => {
                self.formError = null
                window.location.href = '/admin/singers';
            }).catch((error) => {
                self.formErrors = error.response.data.errors;
                if (error.response.status == 422) {
                    self.singerNotFound = error.response.data.message;
                    return false;
                }

                this.handleError(error.response.status);
            });
        }
    }
});
