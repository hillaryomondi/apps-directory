@extends('web.layout.base.layout.default')

@section('title', trans('admin.department.actions.edit', ['name' => $department->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <department-form
                :action="'{{ $department->resource_url }}'"
                :data="{{ $department->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.department.actions.edit', ['name' => $department->name]) }}
                    </div>

                    <div class="card-body">
                        @include('web.department.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('savannabits/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </department-form>

        </div>
    
</div>

@endsection
