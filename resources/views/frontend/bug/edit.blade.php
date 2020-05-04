@extends('frontend.layout.base.layout.default')

@section('title', trans('admin.bug.actions.edit', ['name' => $bug->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <bug-form
                :action="'{{ $bug->resource_url }}'"
                :data="{{ $bug->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.bug.actions.edit', ['name' => $bug->title]) }}
                    </div>

                    <div class="card-body">
                        @include('frontend.bug.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('strathmore/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </bug-form>

        </div>
    
</div>

@endsection
