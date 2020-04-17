@extends('frontend.layout.base.layout.master')

@section('header')
    @include('frontend.layout.base.partials.header')
@endsection

@section('content')

    <div class="app-body">

        @if(View::exists('frontend.layout.sidebar'))
            @include('frontend.layout.sidebar')
        @endif

        <main class="main">

            <div class="container-fluid" id="app" :class="{'loading': loading}">
                <div class="modals">
                    <v-dialog/>
                </div>
                <div>
                    <notifications position="bottom right" :duration="2000" />
                </div>
                @if (\Session::has('error'))
                    <div class="alert alert-danger"> {{\Session::get('error')}}</div>
                @endif
                @yield('body')
            </div>
        </main>
    </div>
@endsection

@section('footer')
    @include('frontend.layout.base.partials.footer')
@endsection

@section('bottom-scripts')
    @parent
@endsection
