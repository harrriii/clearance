<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\library;

class PageController extends Controller
{

    use library;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $t =    'student_list';

        $c =    [
                    '*',
                    'firstname',
                    'middlename',
                    'lastname',
                    'clearance_sheet.student_id',
                    'clearance_sheet_details.department',
                    'clearance_sheet_details.status',
                    'clearance_sheet_details.remarks'
                ];
    
        $j =    [
                    ['clearance_sheet','clearance_sheet.student_id','=','student_list.student_id'],
                    ['clearance_sheet_details','clearance_sheet_details.sheet_no','=','clearance_sheet.id'],
                ];

        $data = library::__FETCHDATA($t,$c,$j);

        return view('welcome', compact('data'));

    }
}
