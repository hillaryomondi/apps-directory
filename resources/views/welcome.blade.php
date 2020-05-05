<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('app.name')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />
        <link href="{{asset('search-23/css/main.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div id="app">
            <search-component
                v-cloak
                inline-template
            >
                <div class="s130 bg-su-blue">
                    {{--@if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                --}}{{--@if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif--}}{{--
                            @endauth
                        </div>
                    @endif--}}
                    <form>
                        <div class="d-flex align-items-end justify-content-center mb-4">
                            <img src="{{asset('images/su-logo-white.png')}}" width="250">
                            <h3 class="text-value-lg font-weight-bolder mb-4 pb-1 text-su-gold">apps directory</h3>
                        </div>
                        <div class="inner-form">
                            <div class="input-field first-wrap">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                    </svg>
                                </div>
                                <input id="search" v-model='search_query' @input="debounceInput" type="text" placeholder="What are you looking for?" />
                            </div>
                            <div class="input-field second-wrap">
                                <button class="btn-search" type="button">SEARCH</button>
                            </div>
                        </div>
                        <span class="info">ex. Cafeteria, Kuali, Payroll, Hrm, People and Culture, ICTS etc</span>

                        <code class="p-2 alert-danger">@{{ searchResultsObject?.data }}</code>
                    </form>
                </div>
            </search-component>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('search-23/js/extention/choices.js')}}"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
