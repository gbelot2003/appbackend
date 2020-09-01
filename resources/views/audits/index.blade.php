@extends('layouts.admin')

@section('labels')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="/users">{{ __('Audit Logs') }}</a></li>
        </ol>
    </nav>
@stop

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Activity Logs</h6>
            <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="toggle-vis btn btn-outline-secondary" data-column="0">id</button>
                    <button class="toggle-vis btn btn-secondary" data-column="1">Updated_at</button>
                    <button class="toggle-vis btn btn-secondary" data-column="2">User</button>
                    <button class="toggle-vis btn btn-secondary" data-column="3">Event</button>
                    <button class="toggle-vis btn btn-secondary" data-column="4">Auditable type</button>
                    <button class="toggle-vis btn btn-outline-secondary" data-column="5">Old Values</button>
                    <button class="toggle-vis btn btn-outline-secondary" data-column="6">New Values</button>
                    <button class="toggle-vis btn btn-secondary" data-column="7">Url</button>
                    <button class="toggle-vis btn btn-secondary" data-column="8">Ip Address</button>
                    <button class="toggle-vis btn btn-outline-secondary" data-column="9">User Agent</button>
                    <button class="toggle-vis btn btn-outline-secondary" data-column="10">Tags</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('id') }}</th>
                            <th>{{ __('Updated at') }}</th>
                            <th>{{ __('User')  }}</th>
                            <th>{{ __('Event') }}</th>
                            <th>{{ __('Auditable type') }}</th>
                            <th>{{ __('Old Values') }}</th>
                            <th>{{ __('New Values') }}</th>
                            <th>{{ __('Url') }}</th>
                            <th>{{ __('Ip Address') }}</th>
                            <th>{{ __('User Agent') }}</th>
                            <th>{{ __('Tags') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
