class Auth {
    constructor() {
        this.token = null;
    }
    
    login(token) {
        window.localStorage.token = token;

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        this.token = token;
    }

    logout() {
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('user');
        this.token = null;
    }

    check() {
        if (window.localStorage.token && window.localStorage.token != "undefined") {
            this.login(window.localStorage.token);
            return true
        }
        else {
            window.localStorage.removeItem('token');
            return false
        }
    }
}

export default new Auth();