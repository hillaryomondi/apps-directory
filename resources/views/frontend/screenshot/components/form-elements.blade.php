<div class="form-group row align-items-center" :class="{'has-danger': errors.has('file_path'), 'has-success': fields.file_path && fields.file_path.valid }">
    <label for="file_path" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.screenshot.columns.file_path') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.file_path" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('file_path'), 'form-control-success': fields.file_path && fields.file_path.valid}" id="file_path" name="file_path" placeholder="{{ trans('admin.screenshot.columns.file_path') }}">
        <div v-if="errors.has('file_path')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('file_path') }}</div>
    </div>
</div>

