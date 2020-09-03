@extends('layouts.admin')

@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ __('Settings') }}</li>
        </ol>
    </nav>
@stop

@section('content')
    <h2>Passport Setting</h2>
    <clients></clients>
    <br>
    <personal-access-tokens></personal-access-tokens>
    <br>
    <authorized></authorized>
@stop