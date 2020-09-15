@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <a href="{{ route('demo-login') }}" class="btn btn-primary ml-auto mr-auto col-sm-6">Login</a>
                            <div class="col-sm-12">
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <github-container :user-prop="{{ auth()->user() }}" />
            @endguest
        </div>
    </div>
</div>
@endsection