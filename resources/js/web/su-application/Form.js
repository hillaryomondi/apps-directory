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
                department: [],
                tags: [],
                url: '',
                private: true,
                roles: [],
            },
            tagOptions: [],
            roles: [],
            departments: [],
        }
    },
    mounted() {
        this.fetchRoles();
        this.fetchDepartments();
    },
    methods: {
        addTag(tag) {
            this.tagOptions.push(tag);
            this.form.tags.push(tag);
        },
        async fetchRoles() {
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/roles`).then(res => {
                    vm.roles = res.data.payload;
                    resolve(res);
                }).catch(err => {
                    vm.roles = [];
                    reject(err);
                })
            }));
        },
        async fetchDepartments(){
            const vm = this;
            return new Promise(((resolve, reject) => {
                axios.get(`/api/departments`).then(res => {
                    vm.departments = res.data.payload;
                    resolve(res);
                }).catch(err => {
                    vm.departments = [];
                    reject(err);
                })
            }));


        },
    }
}
