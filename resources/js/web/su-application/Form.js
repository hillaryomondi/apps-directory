import AppForm from '../app-components/Form/AppForm';

export default {
    mixins: [AppForm],
    props: [],
    data: function () {
        return {
            form: {
                name: '',
                description: '',
                enabled: false,
                department_id: '',
                tags: [],
                url: '',
            },
            tagOptions: []
        }
    },
    mounted() {

    },
    methods: {
        addTag(tag) {
            this.tagOptions.push(tag);
            this.form.tags.push(tag);
        }
    }
}
