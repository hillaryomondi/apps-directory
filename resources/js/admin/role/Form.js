import AppForm from '../app-components/Form/AppForm';

Vue.component('role-form', {
    mixins: [AppForm],
    props: ['permissions'],
    mounted() {
        let self = this;
        console.log(self.form.permissions_matrix);
        self.bak = Object.assign(self.bak, self.form.permissions_matrix);
    },
    data: function() {
        return {
            form: {
                name:  '' ,
                guard_name:  '' ,
                permissions: [],
                permissions_matrix: [],
            },
            check_all: false,
            bak: [],
        }
    },
    methods: {
        checkAll(check=true) {
            let self = this;
            for (let key in self.form.permissions_matrix) {
                if (!self.form.permissions_matrix.hasOwnProperty(key)) continue;
                let permGroup = self.form.permissions_matrix[key];
                if (check) {
                    permGroup.forEach(perm => perm.checked = true)
                } else {
                    permGroup.forEach(perm => perm.checked = false)
                }
            }
        }
    },
    watch: {
        check_all: function (c, o) {
            this.checkAll(c);
        },
    }

});
