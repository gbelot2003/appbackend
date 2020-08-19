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
            @include('profile._profile')
        </div>

        <div class="col-md-9">
            <div class="card text-center">
                @include('profile._tabs')
                <div class="card-body">
                    @include('profile._form')
                </div>
            </div>

        </div>
    </div>
@stop