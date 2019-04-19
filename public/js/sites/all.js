var mixin = {
    methods: {
        handleError(status) {
            switch (status) {
                case 403:
                    alert('Unauthorized action')
                    break;
                case 404:
                    alert('Not Found')
                    break;
                case 405:
                    alert('Method Not Allowed')
                    break;
                case 419:
                    alert('Token Not Found')
                    break;
                case 429:
                    alert('Too Many Requests')
                    break;
                case 500:
                    alert('Server Error')
                    break;
                default:
                    alert('Unknown Error')
                    break;
            }
        }
    }
}
