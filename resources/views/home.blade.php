@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('demo-login') }}" class="btn btn-primary ml-auto mr-auto" style="width: 50%;">Login</a>
                    </div>
                </div>
            @else
                <github-container :user-prop="{{ auth()->user() }}" />
            @endguest
        </div>
    </div>
</div>
@endsection