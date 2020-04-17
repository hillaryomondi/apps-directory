@extends('frontend.layout.base.layout.default')
@section('title',"Home")
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5 class="text-primary text-center font-weight-bolder">Welcome, {{Auth::user()->first_name}}!</h5>
                        <div class="welcome-quote">

                            <blockquote>
                                {{ explode(" - ", $inspiration)[0] }}
                                <cite>
                                    {{ explode(" - ", $inspiration)[1] }}
                                </cite>
                            </blockquote>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
