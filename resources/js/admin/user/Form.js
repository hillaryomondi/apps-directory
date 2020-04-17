import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                password:  '' ,
                username:  '' ,
                user_number:  '' ,
                first_name:  '' ,
                middle_name:  '' ,
                last_name:  '' ,
                activated:  false ,
                last_login_at:  '' ,
                last_login_ip:  '' ,
                
            }
        }
    }
});