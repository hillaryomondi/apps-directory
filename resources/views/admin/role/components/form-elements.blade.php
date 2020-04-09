<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.role.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.role.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('guard_name'), 'has-success': fields.guard_name && fields.guard_name.valid }">
    <label for="guard_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.role.columns.guard_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.guard_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('guard_name'), 'form-control-success': fields.guard_name && fields.guard_name.valid}" id="guard_name" name="guard_name" placeholder="{{ trans('admin.role.columns.guard_name') }}">
        <div v-if="errors.has('guard_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('guard_name') }}</div>
    </div>
</div>

<hr>
<h4 class="text-center">Permissions</h4>
<div class="form-check font-weight-bolder">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input"
               id="check-all-perms"
               name="check_all_perms"
               type="checkbox"
               v-model="check_all">
        <label class="form-check-label" for="check-all-perms">
            Check All
        </label>
    </div>
</div>
<div class="row">
    <div v-for="(group,key) of form.permissions_matrix" :key="key" class="border col-sm-6 col-md-4">
        <h4 class="ml-md-auto text-center font-weight-bolder">@{{ key }}</h4>
        <hr>
        <div v-for="(permission,idx) of group" :key="idx" class="form-check row">
            <div class="" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
                <input class="form-check-input"
                       :id="`perm-${permission.id}-checkbox`"
                       type="checkbox"
                       v-model="permission.checked">
                <label class="form-check-label" :for="`perm-${permission.id}-checkbox`">
                    @{{ permission.display_name }}
                </label>
            </div>
        </div>
    </div>
</div>
