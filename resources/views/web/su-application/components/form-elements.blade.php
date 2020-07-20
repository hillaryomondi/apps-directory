<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.su-application.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.su-application.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.su-application.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.su-application.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('departments'), 'has-success': fields.department && fields.department.valid }">
    <label for="departments" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Department') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

            <multiselect v-model="form.department"
                         :options='departments'
                         v-validate="'required'"
                         id="departments"
                         :multiple="false"
                         placeholder="Select a department"
                         :close-on-select="true"
                         track-by="id"
                         label="name"
            ></multiselect>


        <div v-if="errors.has('department')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('department') }}</div>
    </div>
</div>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tags'), 'has-success': fields.tags && fields.tags.valid }">
    <label for="tags" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.su-application.columns.tags') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <multiselect v-model="form.tags" :options="tagOptions" v-validate="'required'" id="tags" :taggable="true" :multiple="true" @tag="addTag" tag-placeholder="Add Tag" name="tags" :close-on-select="false"></multiselect>
        </div>
        <div v-if="errors.has('tags')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tags') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.su-application.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.su-application.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('private'), 'has-success': fields.private && fields.private.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="private" type="checkbox" v-model="form.private" v-validate="''" data-vv-name="private"  name="private">
        <label class="form-check-label" for="private">Is the App Private?</label>
        <input type="hidden" name="private" :value="form.private">
        <div v-if="errors.has('private')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('private') }}</div>
    </div>
</div>

<div v-if="form.private" class="form-group row align-items-center" :class="{'has-danger': errors.has('roles'), 'has-success': fields.roles && fields.roles.valid }">
    <label for="roles" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('Which roles have access?') }}
    </label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <multiselect v-model="form.roles"
                         :options="roles"
                         v-validate="'required'"
                         id="roles"
                         :multiple="true" name="roles"
                         placeholder="Select a role and enter"
                         :hide-selected="true"
                         :close-on-select="false"
                         track-by="id"
                         label="name"
            ></multiselect>
        </div>
        <div v-if="errors.has('roles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('roles') }}</div>
    </div>
</div>


