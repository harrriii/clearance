<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

    })

    $('.__test').click('',function ()  {

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Department',

                    },
                    {
                        _E: 'input',

                        _T: 'password',

                        _I: 'txtUsername',

                        _N: 'username',

                        _P: 'Enter your username',

                        _C: 'form-control',
                        
                    }
                   
            ]

        data =  {
                        modalTitle: 'Edit Clearance Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'clearance_batch',
                        
                        v2: 'Clearance batch updated successfully.',
                        
                        v3: '',
                        
                        v4: ''
                }

        __BUILDER(data);

    })

    $('.__edit').click('',function ()  {

        var code = $(this).attr('code');

        var year = $(this).attr('year');

        var name = $(this).attr('name');

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Department',

                    },
                    {

                        _E: 'select',

                        _C: 'custom-select form-control',

                        _I: 'txtDepartment',

                        _N: 'department',
                    
                    },
                    {

                        _E: 'label',

                        _C: 'form-label mt-2',

                        _V: 'Year',

                    },
                    {

                        _E: 'select',

                        _C: 'custom-select form-control',

                        _I: 'txtYear',

                        _N: 'year',

                    },
                   
            ]

        data =  {
                        modalTitle: 'Edit Clearance Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'clearance_requirements',
                        
                        v2: 'Clearance requirement updated successfully.',
                        
                        v3: code,
                        
                        v4: ''
                }

        __BUILDER(data);

        // PREPARE FETCHING DATA FOR OPTION
        _IV = 'id';

        _OV = 'name';

        d =  JSON.stringify({

            table:'department_list',

            column: [_OV,_IV]

        })

        encyptedData1 = encryptData(d,hp);

        d =  JSON.stringify({

            table:'year_lvl',

            column: [_OV,_IV]

        })

        encyptedData2 = encryptData(d,hp);

        data = [
                {
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHDATA/',

                        _ED: encyptedData2,

                        _I: 'txtYear',

                        _IV: _IV,

                        _OV: _OV
                },
                {
                        _E: 'option-selected-value',

                        _FS: 'txtYear',

                        _SV: year,
                },
                {
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHDATA/',

                        _ED: encyptedData1,

                        _I: 'txtDepartment',

                        _IV: _IV,

                        _OV: _OV
                },
                {
                        _E: 'option-selected-value',

                        _FS: 'txtDepartment',

                        _SV: name,
                },
        ]

        __ADDTL(data);
 
    })


    $('.chk').click('',function ()  {



        count = 0;


        
        $('.chk').each(function(i, obj) {


            if($(this).prop('checked')){

                count = 1;
            }

        });

        if( count != 0){

            $('.__add').removeAttr('disabled');
           
        }
        else{

            $('.__add').attr('disabled',true);
        }

    })


    $('#chkAll').click('',function ()  {


        if($(this).prop('checked')){

            $('.chk').prop('checked',true);

            $('.__add').removeAttr('disabled');

        }
        else{
            
            $('.chk').prop('checked',false);

            $('.__add').attr('disabled',true);

        }

    })

    $('.__add').click('',function ()  {
        alert('hello')

        startedBy = $('.t').attr('clas');

        content = [
            {

_E: 'label',

_C: 'form-label',

_V: 'Student Information',

},
{
_E: 'input',

_T: 'text',

_I: 'txtRemarks',

_N: 'remarks',

_C: 'form-control',

_A: 'data-role="tagsinput"'

}
                   
            ]

        data =  {
                        modalTitle: 'Require Clearance',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'clearance_requirements',
                        
                        v2: 'Clearance requirement added successfully.',
                        
                        v3: '',
                        
                        v4: ''
                }

        __BUILDER(data,'modal_univ_lg');

        // // PREPARE FETCHING DATA FOR OPTION
        // _IV = 'id';

        // _OV = 'name';

        // d =  JSON.stringify({

        //     table:'department_list',

        //     column: [_OV,_IV]

        // })

        // encyptedData1 = encryptData(d,hp);

        // d =  JSON.stringify({

        //     table:'year_lvl',

        //     column: [_OV,_IV]

        // })

        // encyptedData2 = encryptData(d,hp);

        // data = [
        //         {
        //                 _E: 'option-fetch-value',

        //                 _U: '/UNIV/FETCHDATA/',

        //                 _ED: encyptedData2,

        //                 _I: 'txtYear',

        //                 _IV: _IV,

        //                 _OV: _OV
        //         },
        //         {
        //                 _E: 'option-selected-value',

        //                 _FS: 'txtYear'
        //         },
        //         {
        //                 _E: 'option-fetch-value',

        //                 _U: '/UNIV/FETCHDATA/',

        //                 _ED: encyptedData1,

        //                 _I: 'txtDepartment',

        //                 _IV: _IV,

        //                 _OV: _OV
        //         },
        //         {
        //                 _E: 'option-selected-value',

        //                 _FS: 'txtDepartment'
        //         },
        // ]

        // __ADDTL(data);

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