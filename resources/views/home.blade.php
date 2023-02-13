@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="welcome_header" >{{ __('Welcome!') }}</div>

                <div class="card-body" id="welcome_message">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello, welcome to the AirApp, a system for flight planning.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
