<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reference_number'), 'has-success': fields.reference_number && fields.reference_number.valid }">
    <label for="reference_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.reference_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reference_number" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reference_number'), 'form-control-success': fields.reference_number && fields.reference_number.valid}" id="reference_number" name="reference_number" placeholder="{{ trans('admin.ticket.columns.reference_number') }}">
        <div v-if="errors.has('reference_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reference_number') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.ticket.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.description') }}</label>
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
            {{ trans('admin.ticket.columns.resolved') }}
        </label>
        <input type="hidden" name="resolved" :value="form.resolved">
        <div v-if="errors.has('resolved')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resolved') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reporter_name'), 'has-success': fields.reporter_name && fields.reporter_name.valid }">
    <label for="reporter_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.reporter_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reporter_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reporter_name'), 'form-control-success': fields.reporter_name && fields.reporter_name.valid}" id="reporter_name" name="reporter_name" placeholder="{{ trans('admin.ticket.columns.reporter_name') }}">
        <div v-if="errors.has('reporter_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reporter_name') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reporter_email'), 'has-success': fields.reporter_email && fields.reporter_email.valid }">
    <label for="reporter_email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.reporter_email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reporter_email" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reporter_email'), 'form-control-success': fields.reporter_email && fields.reporter_email.valid}" id="reporter_email" name="reporter_email" placeholder="{{ trans('admin.ticket.columns.reporter_email') }}">
        <div v-if="errors.has('reporter_email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reporter_email') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('created_by'), 'has-success': fields.created_by && fields.created_by.valid }">
    <label for="created_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.created_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.created_by" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('created_by'), 'form-control-success': fields.created_by && fields.created_by.valid}" id="created_by" name="created_by" placeholder="{{ trans('admin.ticket.columns.created_by') }}">
        <div v-if="errors.has('created_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('created_by') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('su_application_id'), 'has-success': fields.su_application_id && fields.su_application_id.valid }">
    <label for="su_application_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ticket.columns.su_application_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.su_application_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('su_application_id'), 'form-control-success': fields.su_application_id && fields.su_application_id.valid}" id="su_application_id" name="su_application_id" placeholder="{{ trans('admin.ticket.columns.su_application_id') }}">
        <div v-if="errors.has('su_application_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('su_application_id') }}</div>
    </div>
</div>

