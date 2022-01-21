<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MemberExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberExportController extends Controller
{
    public function download()
    {
        return Excel::download(new MemberExport(), 'members.xlsx');
    }
}
