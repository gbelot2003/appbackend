@extends('layouts.admin')

@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/roles">{{ __('Roles & Permissions') }}</a></li>
            <li class="breadcrumb-item active">{{ $role->name }}</li>
        </ol>
    </nav>
@stop

@section('content')
    <div class="card shadow mb-4">
        <form action="/roles/{{ $role->id }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Updating') }} {{ $role->name }} {{ __('info') }}</h6>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                   value="{{ $role->name }}" disabled />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>{{ __('Permissions') }}</h5>
                        <button type="submit" class="btn btn-primary mb-2">{{ __('Update') }}</button>
                         {{ Form::select('permissions[]', $perms, $role->permissions ,
                            ['class' => 'perms', 'multiple', 'id' => 'permselect']) }}
                    </div>

                    <div class="col-md-6">
                        <h5>{{ __('Users List') }}</h5>
                        <div class="list-group">
                            @foreach($role->users as $user)
                            <a href="/users/{{ $user->id  }}/edit" class="list-group-item list-group-item-action">{{ $user->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>

    </style>
@stop
