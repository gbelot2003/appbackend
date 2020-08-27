<?php

namespace Acme\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AuditDataTableController {

    /**
     * @return mixed
     */
    public function AuditDataTable()
    {
        $audit = DB::table('audits')->select('audits.id', 'audits.updated_at',
            'audits.event', 'audits.auditable_type', 'audits.old_values', 'audits.new_values', 'audits.url',
            'audits.ip_address', 'audits.user_agent', 'audits.tags', 'users.name as name')
            ->leftJoin('users', 'audits.user_id', '=', 'users.id');

        return dataTables::of($audit)->make(true);
    }
}