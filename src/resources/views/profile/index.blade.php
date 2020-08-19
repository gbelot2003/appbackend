@extends('layouts.admin')

@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ __('Profile') }}</li>
        </ol>
    </nav>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="{{ Avatar::create(auth()->user()->email)->toBase64() }}" class="card-img-top" alt="img">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $user->email }}</li>
                    <li class="list-group-item">{{ $user->phonefield }}</li>
                    <li class="list-group-item">{{ $user->roles[0]->name }}</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>


@stop