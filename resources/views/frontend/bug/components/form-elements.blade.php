<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reference_number'), 'has-success': fields.reference_number && fields.reference_number.valid }">
    <label for="reference_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.reference_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reference_number" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reference_number'), 'form-control-success': fields.reference_number && fields.reference_number.valid}" id="reference_number" name="reference_number" placeholder="{{ trans('admin.bug.columns.reference_number') }}">
        <div v-if="errors.has('reference_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reference_number') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.bug.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('resolved'), 'has-success': fields.resolved && fields.resolved.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="resolved" type="checkbox" v-model="form.resolved" v-validate="''" data-vv-name="resolved"  name="resolved_fake_element">
        <label class="form-check-label" for="resolved">
            {{ trans('admin.bug.columns.resolved') }}
        </label>
        <input type="hidden" name="resolved" :value="form.resolved">
        <div v-if="errors.has('resolved')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resolved') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('created_by'), 'has-success': fields.created_by && fields.created_by.valid }">
    <label for="created_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.created_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.created_by" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('created_by'), 'form-control-success': fields.created_by && fields.created_by.valid}" id="created_by" name="created_by" placeholder="{{ trans('admin.bug.columns.created_by') }}">
        <div v-if="errors.has('created_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('created_by') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resolved_by'), 'has-success': fields.resolved_by && fields.resolved_by.valid }">
    <label for="resolved_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.resolved_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resolved_by" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resolved_by'), 'form-control-success': fields.resolved_by && fields.resolved_by.valid}" id="resolved_by" name="resolved_by" placeholder="{{ trans('admin.bug.columns.resolved_by') }}">
        <div v-if="errors.has('resolved_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resolved_by') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resolved_at'), 'has-success': fields.resolved_at && fields.resolved_at.valid }">
    <label for="resolved_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bug.columns.resolved_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.resolved_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('resolved_at'), 'form-control-success': fields.resolved_at && fields.resolved_at.valid}" id="resolved_at" name="resolved_at" placeholder="{{ trans('strathmore/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('resolved_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resolved_at') }}</div>
    </div>
</div>

