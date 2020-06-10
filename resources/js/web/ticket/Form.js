import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function() {
    return {
    form: {
    reference_number:  '' ,
    title:  '' ,
    description:  '' ,
    resolved:  false ,
    reporter_name:  '' ,
    reporter_email:  '' ,
    created_by:  '' ,
    su_application_id:  '' ,
    
    }
    }
    },
    mounted() {

    },
    methods: {

    }
}
