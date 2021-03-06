<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

        addSearch('studentSearch','studentTable');




    $('.__revoke').click('',function ()  {

        selectedSheets = [];

        $('.chk').each(function(i, obj) {

            if($(this).prop('checked')){

                selectedSheets.push($(this).attr('sheetid'));

            }

        });

        multiInput =  JSON.stringify({

            _D: selectedSheets

        })

        multiInput = encryptData(multiInput,hp);

        content = [
                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Do you want to revoke this clearance requirement?',

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'status',

                        _V: 'Pending',

                        _A: 'hidden'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'status',

                        _V: 'Revoked',

                        _A: 'hidden'

        addSearch('requiredSearch','requiredTable');

        addSearch('completedSearch','completedTable');



    })

    $('.__revoke').click('',function ()  {

        multiplePk = [];

        $('.chk').each(function(i, obj) {

            if($(this).prop('checked')){

                multiplePk.push($(this).attr('sheetid'));

            }

        });

        d = JSON.stringify({
            multiplePk
        })

        sheets = encryptData(d,hp);

        d = JSON.stringify({
                                data: [
                                        ['status','Revoked']
                                    ]
        })

        v4Data = encryptData(d,hp);

        content = [

                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Do you want to revoke this clearance requirement?'

                    }
                   
                ]

        data =  {
                        modalTitle: 'Revoke Clearance Requirement',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'clearance_sheet_details',
                        
                        v2: 'Clearance requirement revoked successfully.',
                        
                        v3: sheets,
                        
                        v4: v4Data
                }

        __BUILDER(data);

    })

    $('.__complete').click('',function ()  {

        multiplePk = [];

        $('.chk').each(function(i, obj) {

            if($(this).prop('checked')){

                multiplePk.push($(this).attr('sheetid'));

            }

        });

        d = JSON.stringify({

            multiplePk

        })

        sheets = encryptData(d,hp);

        d = JSON.stringify({

                            data:   [
                                        ['status','Completed']
                                    ]

        })

        v4Data = encryptData(d,hp);

        content = [

                    {
                        _E: 'label',

                        _C: 'form-label font-weight-bold',

                        _V: 'Attachment'

                    },
                    {

                        _E: 'input',

                        _T: 'file',

                        _I: 'txtFilename',

                        _N: 'attachment',

                        _C: 'custom-file-input',

                        _CL: 'Choose File...',

                    }, 
                    {
                        _E: 'label',

                        _C: 'form-label font-weight-bold',

                        _V: 'Remarks'

                    },
                    {

                        _E: 'textarea',

                        _I: 'txtRemarks',

                        _N: 'remarks',

                        _P: 'Enter clearance remarks here..',

                        _C: 'form-control',

                        _R: '4'

                    },
                
                ]

        data =  {
                        modalTitle: 'Complete Clearance',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'clearance_sheet_details',
                        
                        v2: 'Clearance requirement marked as completed successfully.',
                        
                        v3: sheets,
                        
                        v4: v4Data,

                        v5: '/upload/librarian/',

                        v6: 'multipart/form-data',
                }

        __BUILDER(data);

    })

    // $('.__edit').click('',function ()  {

    //     var code = $(this).attr('code');

    //     var year = $(this).attr('year');

    //     var name = $(this).attr('name');

    //     content = [
    //                 {

    //                     _E: 'label',

    //                     _C: 'form-label',

    //                     _V: 'Department',

    //                 },
    //                 {

    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtDepartment',

    //                     _N: 'department',
                    
    //                 },
    //                 {

    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'Year',

    //                 },
    //                 {

    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtYear',

    //                     _N: 'year',

    //                 },
                   
    //         ]

    //     data =  {
    //                     modalTitle: 'Edit Clearance Batch',
                        
    //                     modalContent: content,
                        
    //                     buttonSubmit:  'Save',
                        
    //                     buttonCancel: 'Close',
                        
    //                     url: '/UNIV/EDIT',
                        
    //                     v1: 'clearance_requirements',
                        
    //                     v2: 'Clearance requirement updated successfully.',
                        
    //                     v3: code,
                        
    //                     v4: ''
    //             }

    //     __BUILDER(data);

    //     // PREPARE FETCHING DATA FOR OPTION
    //     _IV = 'id';

    //     _OV = 'name';

    //     d =  JSON.stringify({

    //         table:'department_list',

    //         column: [_OV,_IV]

    //     })

    //     encyptedData1 = encryptData(d,hp);

    //     d =  JSON.stringify({

    //         table:'year_lvl',

    //         column: [_OV,_IV]

    //     })

    //     encyptedData2 = encryptData(d,hp);

    //     data = [
    //             {
    //                     _E: 'option-fetch-value',

    //                     _U: '/UNIV/FETCHDATA/',

    //                     _ED: encyptedData2,

    //                     _I: 'txtYear',

    //                     _IV: _IV,

    //                     _OV: _OV
    //             },
    //             {
    //                     _E: 'option-selected-value',

    //                     _FS: 'txtYear',

    //                     _SV: year,
    //             },
    //             {
    //                     _E: 'option-fetch-value',

    //                     _U: '/UNIV/FETCHDATA/',

    //                     _ED: encyptedData1,

    //                     _I: 'txtDepartment',

    //                     _IV: _IV,

    //                     _OV: _OV
    //             },
    //             {
    //                     _E: 'option-selected-value',

    //                     _FS: 'txtDepartment',

    //                     _SV: name,
    //             },
    //     ]

    //     __ADDTL(data);
 
    // })


    $('.chk').click('',function ()  {

        count = 0;

        $('.chk').each(function(i, obj) {

            if($(this).prop('checked')){

                count = 1;
            }

        });

        if( count != 0){

            $('.__add').removeAttr('disabled');

            $('.__revoke').removeAttr('disabled');

            $('.__complete').removeAttr('disabled');

            $('.__printReport').removeAttr('disabled');


            

        }
        else{

            $('.__add').attr('disabled',true);

            $('.__revoke').attr('disabled',true);

            $('.__complete').attr('disabled',true);

            $('.__printReport').attr('disabled',true);

        }

    })


    $('#chkAll').click('',function ()  {


        if($(this).prop('checked')){

            $('.chk').prop('checked',true);

            $('.__add').removeAttr('disabled');

            $('.__revoke').removeAttr('disabled');

            $('.__complete').removeAttr('disabled');

            $('.__printReport').removeAttr('disabled');


        }
        else{
            
            $('.chk').prop('checked',false);

            $('.__add').attr('disabled',true);

            $('.__revoke').attr('disabled',true);

            $('.__complete').attr('disabled',true);

            $('.__printReport').attr('disabled',true);


        }

    })

    $('.__add').click('',function ()  {

        selectedSheets = [];

        $('.chk').each(function(i, obj) {

            if($(this).prop('checked')){

                selectedSheets.push($(this).attr('sheetno'));

            }

        });

        
        multiInput =  JSON.stringify({

            _T: 'PK-INPUT',

            _TC: 'sheet_no',

            _D: selectedSheets

        })

        multiInput = encryptData(multiInput,hp);

        signedBy = $('.t').attr('clas');

        departmentNo = $('.t').attr('dep');

        console.log(departmentNo);

        content = [

                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Remarks',

                    },
                    {
                        
                        _E: 'textarea',

                        _I: 'txtRemarks',

                        _N: 'remarks',

                        _P: 'Enter clearance remarks here..',

                        _C: 'form-control',

                        _R: '4'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'status',

                        _C: 'form-control',

                        _V: 'Pending',

                        _A: 'hidden'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'signed_by',

                        _C: 'form-control',

                        _V: signedBy,

                        _A: 'hidden'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'department',

                        _C: 'form-control',

                        _V: departmentNo,

                        _A: 'hidden'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'sheet_no',

                        _C: 'form-control',

                        _V: '',

                        _A: 'hidden'

                    },
                    {
                        
                        _E: 'input',

                        _T: 'text',

                        _N: 'attachment',

                        _C: 'form-control',

                        _V: 'no attachment',

                        _A: 'hidden'

                    }
                   
                ]

        data =  {

                    modalTitle: 'Require Clearance',
                    
                    modalContent: content,
                    
                    buttonSubmit:  'Save',
                    
                    buttonCancel: 'Close',
                    
                    url: '/UNIV/INSERT',
                    
                    v1: 'clearance_sheet_details',
                    
                    v2: 'Clearance requirement added successfully.',
                    
                    v3: '',
                    
                    v4: '',

                    v5: '',

                    mi: multiInput,

                }

        __BUILDER(data,'modal_univ');

    })

    $('body').on('click', '.__delete', function () {

        code = $(this).attr('code');

        content = [
                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Do you want to delete this item?',

                    },
                   
                ]

        data =  {
                        modalTitle: 'Delete Clearance Requirement',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/DELETE',
                        
                        v1: 'clearance_requirements',
                        
                        v2: 'Clearance requirement deleted successfully.',
                        
                        v3: code,
                        
                        v4: ''
                }

        __BUILDER(data);

    })

    $('body').on('change', '.__filter', function () {
        
        selected = $(this).val();

        if( selected  == '*' ){

            d = {
                    url: 'pages/dashboard/librarian/students',

                    t: 'student_list',

                    c:  [  

                            '*'

                        ],

                    j:  [

                            ['year_lvl','year_lvl.id','=','student_list.year']

                        ],

                    transferWith: [

                            'id',

                            'role',

                            'data',

                            'filter'
                        
                    ],
                    filterData: 
                                {
                                    f_t:    'year_lvl',

                                    f_c:    [

                                                'year_lvl.name',

                                                'year_lvl.id',

                                            ],

                                },

                        selectedFilter: selected

            }      

        }
        else {

            d = {
                    url: 'pages/dashboard/librarian/students',

                    t: 'student_list',

                    c:  [  

                            '*'

                        ],

                    j:  [

                            ['year_lvl','year_lvl.id','=','student_list.year']
                            
                        ],
                    w:  [

                            ['year','=',selected]

                        ],

                    transferWith: [

                            'id',

                            'role',

                            'data',

                            'filter'
                        
                    ],
                    filterData: 
                                {
                                    f_t:    'year_lvl',

                                    f_c:    [

                                                'year_lvl.name',

                                                'year_lvl.id',

                                            ],

                                },

                        selectedFilter: selected

            }   
 
        }

        d = JSON.stringify(d);

        encyptedData = encryptData(d,hp);

        location.href = '/UNIV/SHOW/'+encyptedData;

    })
    
 
    
  </script>