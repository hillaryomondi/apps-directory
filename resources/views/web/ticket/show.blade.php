@extends('web.layout.base.layout.default')

@section('title', trans("Show $ticket->title"))

@section('body')

<div class="container-xl" xmlns="http://www.w3.org/1999/html">
    <div class="card">

            <ticket-form
                :action="'{{ $ticket->resource_url }}'"
                :data="{{ $ticket->toJson() }}"
                v-cloak
                inline-template>
            
                <div class="form-edit">
                    <div class="card-header">
                        <i class="fa fa-eye"></i> Show
                    </div>
                    <div class="card-body">
                        <strong>Implement Show Here</strong>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                </div>
        </ticket-form>
    </div>
</div>

@endsection
