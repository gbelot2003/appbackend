@extends('layouts.admin')


@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="/users">{{ __('Users') }}</a></li>
        </ol>
    </nav>
@stop

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
        </div>
        <div class="card-body">
            <div  class="table-responsive">
                <table id="laravel_datatable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('id') }}</th>
                            <th>{{ __('Name')  }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Telephone') }}</th>
                            <th>{{ __('Rol') }}</th>
                            <th>{{ __('State') }}</th>
                            <th>{{ __('Date of Submission') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop