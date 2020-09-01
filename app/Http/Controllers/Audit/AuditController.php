<?php

namespace App\Http\Controllers\Audit;

use Acme\Http\Controllers\AuditDataTableController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Models\Audit;
use Yajra\DataTables\DataTables;

class AuditController extends Controller
{
    function __construct()
    {
        $this->middleware(['role:Administrator|Supervisor']);
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $table = new AuditDataTableController();
            return $table->AuditDataTable();
        }

        $title = 'Audit Logs';
        return View('audits.index', compact('title'));
    }




}
