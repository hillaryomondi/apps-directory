import AppForm from '../app-components/Form/AppForm';

Vue.component('assign-permissions', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                selected_permissions: [],
            }
        }
    }

});
