@extends('frontend.layout.base.layout.default')

@section('title', trans('admin.screenshot.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <screenshot-form
            :action="'{{ url('screenshots') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.screenshot.actions.create') }}
                </div>

                <div class="card-body">
                    @include('frontend.screenshot.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('strathmore/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </screenshot-form>

        </div>

        </div>
    
@endsection
