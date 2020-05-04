@extends('frontend.layout.base.layout.default')

@section('title', trans('admin.su-application.actions.edit', ['name' => $suApplication->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <su-application-form
                :action="'{{ $suApplication->resource_url }}'"
                :data="{{ $suApplication->toJson() }}"
                :departments="{{$departments->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.su-application.actions.edit', ['name' => $suApplication->name]) }}
                    </div>

                    <div class="card-body">
                        @include('frontend.su-application.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('strathmore/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </su-application-form>

        </div>

</div>

@endsection
