<?php


namespace App\Http\Controllers;
use PDF;
use Auth;
use App;
use DB;
use Validator;
use App\Models\User;
use App\Models\role_user;
use Illuminate\Http\Request;
use App\Http\Traits\library;
use Exporter;
use Importer;
use Schema;

// require __DIR__ . '/vendor/autoload.php';



class DashboardController extends Controller
{
    use library;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function clearance()
    {   
        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'Staff' ){

            $t =    'clearance_batch';

            $c =    [
                        'clearance_batch.id as id',
                        'startDate',
                        'endDate',
                        'users.name',
                        'clearance_batch.startedBy as started',
                        'clearance_batch.campus as campus',
                        'campus_list.name as campusName',
                        'status'
                    ];
        
            $j =    [
                        ['users','users.id','=','clearance_batch.startedBy'],
                        ['campus_list','campus_list.id','=','clearance_batch.campus'],

                    ];

            $data = library::__FETCHDATA($t,$c,$j);

            return view('pages/dashboard/staff/clearance', compact('role','id','data'));

        }

    }

    public function campus()
    {   
        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'Administrator' ){

            $t =    'campus_list';

            $c =    [
                        'id',
                        'name',
                    ];

            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/administrator/campus', compact('role','id','data'));

        }

    }

    public function templates(){

        $role = $this->getRole();

        $id = Auth::user()->id;


        if( $role == 'Administrator' ){

            $t =    'excel_templates';

            $c =    [
                        '*'
                    ];

            $data = library::__FETCHDATA($t,$c);

            return view('pages/func/templates',compact('role','id','data'));

        }

    }

    public function student()
    {   
        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'Staff' ){

            $t =    'student_list';

            $c =    [
                        '*'
                    ];

            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/staff/student', compact('role','id','data'));

        }

        if( $role == 'Student' ){

            $t =    'student_list';

            $c =    [
                        '*'
                    ];

            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/staff/student', compact('role','id','data'));

        }

        if( $role == 'Administrator' ){

            $t =    'student_list';

            $c =    [
                        '*'
                    ];

            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/administrator/student', compact('role','id','data'));

        }

    }

    public function importFile(){

        $role = $this->getRole();

        $id = Auth::user()->id;

        $data = DB::select('SHOW TABLES');

        return view('pages/func/import',compact('role','id','data'));

    }

    public function importExcel(Request $request){

        $TEMP = json_encode($request->all());
         
        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $validator = Validator::make($request->all(), [

            'filename' => 'required|max:5000|mimes:xlsx,xls,csv'

        ]);

        $TABLE_COLUMNS = Schema::getColumnListing($TEMP['table']);

        if( $validator->passes() ){

            $file =  $request->file('filename');

            $filename = $file->getClientOriginalName();

            $savePath = public_path('/upload/');

            $file->move($savePath, $filename);

            $excel = Importer::make('Excel');

            $excel->load($savePath.$filename);

            $collection = $excel->getCollection();

            $rowcount = 0 ;

            for ($i=1; $i < sizeof($collection); $i++) { 

                for ($x=0; $x <sizeof($TABLE_COLUMNS) ; $x++) { 

                    $ARR[$rowcount][$TABLE_COLUMNS[$x]] = $collection[$i][$x];
                    
                }

                $rowcount++;
            }

            library::__STORE($TEMP['table'],$ARR);

            return redirect()->back()->with(['success'=>'Data Imported Successfully.']);

        }
        else{

            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);

        }

    }

    // public function student()
    // {
        
    //     return view('pages/dashboard/student');

    // }
    
    public static function schedule()
    {

        return view('pages/dashboard/schedule');

    }

    public function getRole()
    {
        $t =    'role_user';

        $c =    [
                    'name'
                ];
    
        $w =    [
                    ['user_id', '=', Auth::user()->id ]
                ];

        $temp = library::__FETCHDATA($t,$c,null,$w,null);
        
        $id = Auth::user()->id;

        $role = json_decode(json_encode($temp), true);
        
        $role = $role[0]['name'];

        return $role;
    }

    public function RequiredStudents()
    {
        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'Librarian' )
        {

            $t =    'clearance_sheet_details';

            $c =    [
                  
                        'clearance_sheet_details.id as sheetid',
                        
                        'clearance_sheet.id as sheetNo',
                
                        'clearance_sheet.student_id',
                
                        'clearance_sheet.section',
                
                        'clearance_sheet.year',
                
                        'clearance_sheet.campus',
                
                        'clearance_sheet.batch',
                
                        'student_list.firstname',
                
                        'student_list.middlename',
                
                        'student_list.lastname',

                        'year_lvl.name as yearname',
                
                    ];

            $j =    [

                        ['clearance_sheet','clearance_sheet.id','=','clearance_sheet_details.sheet_no'],

                        ['student_list','student_list.student_id','=','clearance_sheet.student_id'],

                        ['year_lvl','year_lvl.id','=','clearance_sheet.year'],

                    ];


            $w =    [

                        ['signed_by','=',$id],

                        ['status','=','Pending']

                    ];

            $data = library::__FETCHDATA($t,$c,$j,$w);

            $t =    'year_lvl';

            $c =    '*';

            $filter = library::__FETCHDATA($t,$c);

            $t =    'department_list';

            $c =    'id';

            $c =    'id';

            $w =    [
                     
                        ['name','=','Library']
                    
                    ];

            $departmentno = library::__FETCHDATA($t,$c,null,$w);

            $departmentno =  $departmentno[0]->id;

            $selectedFilter = '*';
            
            return view('pages/dashboard/librarian/required',compact('role','id','data','filter','selectedFilter','departmentno'));

        }     

    }

    public function StudentSheets()
    {
        
        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'student' ) 
        {

            $t =    'clearance_sheet';

            $c =    [
                        'clearance_sheet.id',
                        'clearance_sheet.student_id',
                        'clearance_sheet.section',
                        'clearance_sheet.year',
                        'clearance_sheet.campus',
                        'clearance_sheet.batch',
                        'student_list.firstname',
                        'student_list.middlename',
                        'student_list.lastname',
                    ];

            $j =    [

                        ['student_list','student_list.student_id','=','clearance_sheet.student_id']

                    ];

            $data = library::__FETCHDATA($t,$c,$j);

            // dd($data);  

            $t =    'clearance_sheet';

            $c =    [
                        'batch',
                    ];

            $g =    'batch';

            $filter = library::__FETCHDATA($t,$c,null,null,$g);

            $selectedFilter = '*';
            
            return view('pages/dashboard/administrator/studentsheets',compact('role','id','data','filter','selectedFilter'));

        }

        if( $role == 'Librarian' )
        {

            // select * from clearance_sheet where id not in (select sheet_no from clearance_sheet_details)

            $t =    'clearance_sheet';

            $c =    [
                  
                        'clearance_sheet.id as sheetNo',
                
                        'clearance_sheet.student_id',
                
                        'clearance_sheet.section',
                
                        'clearance_sheet.year',
                
                        'clearance_sheet.campus',
                
                        'clearance_sheet.batch',
                
                        'student_list.firstname',
                
                        'student_list.middlename',
                
                        'student_list.lastname',

                        'year_lvl.name as yearname',
                
                    ];

            $j =    [

                        ['student_list','student_list.student_id','=','clearance_sheet.student_id'],

                        ['year_lvl','year_lvl.id','=','clearance_sheet.year'],

                    ];

            $wni =  ['clearance_sheet.id','clearance_sheet_details.sheet_no','clearance_sheet_details'];

            $data = library::__FETCHDATA($t,$c,$j,null,null,null,null,null,$wni);

            $t =    'year_lvl';

            $c =    '*';

            $filter = library::__FETCHDATA($t,$c);

            $t =    'department_list';

            $c =    'id';

            $c =    'id';

            $w =    [
                     
                        ['name','=','Library']
                    
                    ];

            $departmentno = library::__FETCHDATA($t,$c,null,$w);

            $departmentno =  $departmentno[0]->id;

            $selectedFilter = '*';
            
            return view('pages/dashboard/librarian/sheets',compact('role','id','data','filter','selectedFilter','departmentno'));

        }        

    }

    public function CompletedClearance()
    {

        $role = $this->getRole();

        $id = Auth::user()->id;

        if( $role == 'Librarian' )
        {

            // select * from clearance_sheet where id not in (select sheet_no from clearance_sheet_details)

            $t =    'clearance_sheet';

            $c =    [
                  
                        'clearance_sheet.id as sheetNo',
                
                        'clearance_sheet.student_id',
                
                        'clearance_sheet.section',
                
                        'clearance_sheet.year',
                
                        'clearance_sheet.campus',
                
                        'clearance_sheet.batch',
                
                        'student_list.firstname',
                
                        'student_list.middlename',
                
                        'student_list.lastname',

                        'year_lvl.name as yearname',
                
                    ];

            $j =    [

                        ['student_list','student_list.student_id','=','clearance_sheet.student_id'],

                        ['clearance_sheet_details','clearance_sheet_details.sheet_no','=','clearance_sheet.id'],

                        ['year_lvl','year_lvl.id','=','clearance_sheet.year'],

                    ];

            $w =    [

                        ['signed_by','=',$id],

                        ['status','=','Completed']

                    ];

            $data = library::__FETCHDATA($t,$c,$j,$w);

            $t =    'year_lvl';

            $c =    '*';

            $filter = library::__FETCHDATA($t,$c);

            $t =    'department_list';

            $c =    'id';

            $c =    'id';

            $w =    [
                     
                        ['name','=','Library']
                    
                    ];

            $departmentno = library::__FETCHDATA($t,$c,null,$w);

            $departmentno =  $departmentno[0]->id;

            $selectedFilter = '*';
            
            return view('pages/dashboard/librarian/completed',compact('role','id','data','filter','selectedFilter','departmentno'));

        }        
        
    }

    public function index()
    {
        $role = $this->getRole();

        $id = Auth::user()->id;

        if($role == 'Staff')
        {

            $role = $this->getRole();

            $id = Auth::user()->id;

            if( $role == 'Staff' ){

                $t =    'clearance_batch';

                $c =    [
                            'clearance_batch.id as id',
                            'startDate',
                            'endDate',
                            'users.name',
                            'clearance_batch.startedBy as started',
                            'clearance_batch.campus as campus',
                            'campus_list.name as campusName',
                            'status'
                        ];
            
                $j =    [
                            ['users','users.id','=','clearance_batch.startedBy'],
                            ['campus_list','campus_list.id','=','clearance_batch.campus'],

                        ];

                $data = library::__FETCHDATA($t,$c,$j);

                return view('pages/dashboard/staff/clearance', compact('role','id','data'));

            }


        }

        if($role == 'Student')
        {

            $t =    'clearance_batch';

            $c =    'id';
                    
            $o =    'id';

            $a =    'desc';

            $clearanceBatch = library::__FETCHLATESTCODE($t,$c,$o,$a,0);

            // DECREMENT 1 BCOZ USING FETCHLATEST WILL INCREMENT 1 VALUE TO THE LATEST CODE
            $clearanceBatch = $clearanceBatch - 1;

            $hasClearance = isset($clearanceBatch);

            $studentId = $this->getStudentId($id);

            $t =    'clearance_sheet';

            $c =    [
                      
                        'clearance_sheet.id',
                        
                        'clearance_sheet.student_id',
                        
                        'clearance_sheet.section',
                        
                        'clearance_sheet.year',
                        
                        'clearance_sheet.batch',
                        
                        'clearance_sheet.campus',

                        'campus_list.name as campusname',

                        'year_lvl.name as yearname',

                    ];

            $w =    [   
                      
                        ['batch','=',$clearanceBatch],
                        ['student_id','=',$studentId],
                  
                    ];

            $j =    [

                        ['campus_list','campus_list.id','=','clearance_sheet.campus'],

                        ['year_lvl','year_lvl.id','=','clearance_sheet.campus']

                    ];

            $data = library::__FETCHDATA($t,$c,$j,$w);

            $t =    'year_lvl';

            $c =    [
     
                        'year_lvl.name',
                        'year_lvl.id',
  
                    ];

            $year = library::__FETCHDATA($t,$c);

            $t =    'campus_list';

            $c =    [
     
                        'campus_list.name',
                        'campus_list.id',
  
                    ];

            $campus = library::__FETCHDATA($t,$c);

            $hasSheet = $this->hasCount($data);
           
            return view('pages/dashboard/student/clearance',compact('role','id','year','campus','hasClearance','hasSheet','data','clearanceBatch','studentId'));

        }

        if($role == 'Librarian')
        {

            $t =    'student_list';

            $c =    [
                        '*'
                    ];

            $j =    [

                        ['year_lvl','year_lvl.id','=','student_list.year']

                    ];


            $data = library::__FETCHDATA($t,$c,$j);

            $t =    'year_lvl';

            $c =    [
     
                        'year_lvl.name',
                        'year_lvl.id',
  
                    ];


            $filter = library::__FETCHDATA($t,$c);

            $selectedFilter = '*';

            return view('pages/dashboard/librarian/students',compact('role','id','data','filter','selectedFilter'));

        }

        if($role == 'Administrator')
        {   

            
            $t =    'department_list';

            $c =    [
                        '*'
                    ];
           
            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/administrator/department',compact('role','data','id'));

            // $t =    'clearance_requirements';

            // $c =    [
            //             'clearance_requirements.id',
            //             'department_list.name',
            //             'year_lvl.name as yearName',
            //             'clearance_requirements.year',
            //             'clearance_requirements.department as departmentValue'
            //         ];

            // $j =    [
            //             ['department_list','department_list.id','=','clearance_requirements.department'],
            //             ['year_lvl','year_lvl.id','=','clearance_requirements.year']
            //         ];

            // $data = library::__FETCHDATA($t,$c,$j);

            // $t =    'clearance_requirements';

            // $c =    [
     
            //             'year_lvl.name',
            //             'year_lvl.id',
  
            //         ];

            // $j =    [
            //             ['department_list','department_list.id','=','clearance_requirements.department'],
            //             ['year_lvl','year_lvl.id','=','clearance_requirements.year']
            //         ];

            // $g =    [

            //             'clearance_requirements.year'

            //         ];

            // $filter = library::__FETCHDATA($t,$c,$j,null,$g);

            // $selectedFilter = '*';

            // return view('pages/dashboard/administrator/clearance',compact('role','data','id','filter','selectedFilter'));

        }
       
    }

    public function clearanceInformation()
    {

        $sheetNo = 0;

        $role = $this->getRole();

        $id = Auth::user()->id;

        $studentId = $this->getStudentId($id);

        $t =    'clearance_batch';

        $c =    'id';
                
        $o =    'id';

        $a =    'desc';

        $clearanceBatch = library::__FETCHLATESTCODE($t,$c,$o,$a,0);

        $t =    'clearance_sheet';

        $c =    [
                    'id'
                ];

        $w =    [
                    ['student_id','=', $studentId]
                ];

        $sheetNo = library::__FETCHDATA($t,$c,null,$w);

        $data = ['nosheet'];

        foreach ($sheetNo as $key => $value) {
            
            $sheetNo = $value->id;
        
        }

        if(is_int($sheetNo))
        {
            $t =    'clearance_sheet_details';

            $c =    [
                        'clearance_sheet_details.id as id',
                        'clearance_sheet_details.department',
                        'clearance_sheet_details.signed_by',
                        'clearance_sheet_details.attachment',
                        'clearance_sheet_details.status',
                        'clearance_sheet_details.remarks',
                        'department_list.name as departmentname',
                        'users.name',
                    ];

            $j =    [

                        ['department_list','department_list.id','=','clearance_sheet_details.department'],
                        
                    ];

            $lj =    [
                
                        ['users','users.id','=','clearance_sheet_details.signed_by']
                
                    ];

            $w =    [
                        ['clearance_sheet_details.sheet_no','=',$sheetNo]
                    ];

            $data = library::__FETCHDATA($t,$c,$j,$w,null,null,$lj);

            // dd($data);

            return view('pages/dashboard/student/clearanceinformation',compact('role','id','data','sheetNo'));

        }
        else
        {

            $sheetNo = 0;

            return view('pages/dashboard/student/clearanceinformation',compact('role','id','sheetNo'));

        }
        

        // dd($data);
       
  
    }

    public function department(){

        $role = $this->getRole();

        $id = Auth::user()->id;

        if($role == 'Administrator'){

            $t =    'department_list';

            $c =    [
                        '*'
                    ];
           
            $data = library::__FETCHDATA($t,$c);

            return view('pages/dashboard/administrator/department',compact('role','data','id'));

        }
        
    }
        

    public function hasCount($data)
    {
        if( count($data) )
        {

            $output = true;

        }
        else
        {

            $output = false;
        
        }

        return $output;
    }
    

    public function report()
    {
        return view('pages/dashboard/report');
    }

    public function studentprofile()
    {
        // $role = library::getRole();

        // return view('pages/dashboard/student/profile',compact('role'));
    }

    public function printreport()
    {
        // $html ='<h1>Bill</h1><p>You owe me money, dude.</p>';
        // $pdf =PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('1.pdf');
        // return $pdf->stream('1.pdf');
        // // $html = "ge";
        // // $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('test.pdf');
        // // $pdf->setTemporaryFolder("C:/xampp/htdocs/mlqu2/public/pdf");
        // // return $pdf->stream('test.pdf');

        return view('layouts/pdf/professor/report/enlistment');

    }

    public function getClass()
    {       

        $role = $this->getRole();
        
        $t =    'classes';

        $c =    [
                    'classes.year as yearNo',
                    'classes.term as termNo',
                    'classes.adviser as professorNo',
                    'classes.id as no',
                    'classes.school_year as schoolYearNo',
                    'users.name as created',
                    'created_date as date',
                    'professor_profile.name as professor',
                    'section',
                    'room',
                    'max_student as maxstudent',
                    'year_lvl.yr_name',
                    'terms.term',
                    'school_year.school_year'
                ];

        $j =    [
                    ['professor_profile', 'professor_profile.id', '=', 'classes.adviser'],
                    ['terms', 'terms.term', '=', 'classes.term'],
                    ['year_lvl', 'year_lvl.yr_code', '=', 'classes.year'],
                    ['school_year', 'school_year.id', '=', 'classes.school_year'],
                    ['users', 'users.id', '=', 'classes.created_by']
                ];

        $o =    'classes.id';


        $classes = library::__FETCHDATA($t,$c,$j,null,null,$o);

        $id = Auth::user()->id;

        return view('pages/dashboard/registrar/class',compact('classes','role','id'));
    }

    public function getStudentId($userId){

        $t =    'student_account';

        $c =    [
                    'stud_id'
                ];

        $w =    [
                    ['userid','=',$userId]
                ];
        
        $id = library::__FETCHDATA($t,$c,null,$w);
                
        foreach ($id as $key => $value) {

            $id = $value->stud_id;

        }

        return $id;

    }

    public function getEnlistmentSubjects($data){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $t =    'enlistment_subject';

        $c =    [   
                    'enlistment_subject.no',
                    'subjects.subject_code as subjectCode',
                    'subjects.name as subject',
                    'for_yr as forYr', 
                    'min_yr as minYr',
                    'max_yr as maxYr'
                ];

        $j =    [
                    ['subjects', 'subjects.subject_code', '=', 'enlistment_subject.subject_code'],
                    ['enlistment_batch', 'enlistment_batch.no', '=', 'enlistment_subject.enlistment_batch'],
                ];


        $w =    [ 
                    ['enlistment_batch.no','=',$data]
                ];

        $subjects = library::__FETCHDATA($t,$c,$j,$w);
        
        // dd($data);


        
        return view('pages/dashboard/registrar/subjects',compact('role','subjects','id','data'));

    }

}
