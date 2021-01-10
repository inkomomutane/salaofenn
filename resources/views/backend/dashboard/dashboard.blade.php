@extends('backend.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged as !') }} <b>{{ Auth::user()->role->level }}</b> Level.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection