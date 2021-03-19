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
                    url: 'pages/dashboard/administrator/clearance',

                    t: 'clearance_requirements',

                    c: [  
                            'clearance_requirements.id',

                            'department_list.name',
                        
                            'year_lvl.name as yearName',
                        
                            'clearance_requirements.year',
                        
                            'clearance_requirements.department as departmentValue'

                        ],

                    j:[

                        ['department_list','department_list.id','=','clearance_requirements.department'],
                        
                        ['year_lvl','year_lvl.id','=','clearance_requirements.year']

                    ],

                    transferWith: [

                        'id',

                        'role',

                        'data',

                        'filter'
                    ],

                    filterData: 
                                {
                                    f_t:    'clearance_requirements',

                                    f_c:    [

                                                'year_lvl.name',

                                                'year_lvl.id',

                                            ],

                                    f_j:    [
                                                ['department_list','department_list.id','=','clearance_requirements.department'],

                                                ['year_lvl','year_lvl.id','=','clearance_requirements.year']
                                            ],

                                    f_g:    [

                                                'clearance_requirements.year'

                                            ],

                                },

                    selectedFilter: selected

            }      

        }
        else {

            d = {
                    url: 'pages/dashboard/administrator/clearance',

                    t: 'clearance_requirements',

                    c: [  
                            'clearance_requirements.id',

                            'department_list.name',
                        
                            'year_lvl.name as yearName',
                        
                            'clearance_requirements.year',
                        
                            'clearance_requirements.department as departmentValue'

                        ],

                    j:[

                        ['department_list','department_list.id','=','clearance_requirements.department'],
                        
                        ['year_lvl','year_lvl.id','=','clearance_requirements.year']

                    ],

                    w:[

                        ['year', '=', selected]

                    ],

                    transferWith: [

                        'id',

                        'role',

                        'data',

                        'filter'
                    ],
                    filterData: 
                                {
                                    f_t:    'clearance_requirements',

                                    f_c:    [

                                                'year_lvl.name',

                                                'year_lvl.id',

                                            ],

                                    f_j:    [
                                                ['department_list','department_list.id','=','clearance_requirements.department'],

                                                ['year_lvl','year_lvl.id','=','clearance_requirements.year']
                                            ],

                                    f_g:    [

                                                'clearance_requirements.year'

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