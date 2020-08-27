@extends('layouts.admin')

@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ __('Roles & Permissions') }}</li>
        </ol>
    </nav>
@stop

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Roles List') }}</h6>
        </div>
        <div class="card-body">
            <div class="list-group">
                @foreach($roles as $role)
                <a href="/roles/{{ $role->id }}/edit" class="list-group-item list-group-item-action">
                    {{ $role->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

@stop