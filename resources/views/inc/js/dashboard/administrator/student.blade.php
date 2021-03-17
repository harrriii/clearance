<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

    })

    $('.__edit').click('',function ()  {

        var code = $(this).attr('code');

        var name = $(this).attr('name');

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Department',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtDepartment',

                        _N: 'name',

                        _C: 'form-control',

                        _V: name,

                    },

                ]

        data =  {
                        modalTitle: 'Edit Department',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'department_list',
                        
                        v2: 'Department updated successfully.',
                        
                        v3: code,
                        
                        v4: ''
                }

        __BUILDER(data);

    })

    $('.__add').click('',function ()  {

        startedBy = $('.t').attr('clas');

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Student Id',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtStudentId',

                        _N: 'student_id',

                        _C: 'form-control',

                    },
                    {

                        _E: 'label',

                        _C: 'form-label mt-2',

                        _V: 'First Name',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtFirstname',

                        _N: 'firstname',

                        _C: 'form-control',

                    },

                    {

                        _E: 'label',

                        _C: 'form-label  mt-2',

                        _V: 'Middle Name',

                    },
                    {

                        _E: 'input',

                        _T: 'text',

                        _I: 'txtMiddlename',

                        _N: 'middlename',

                        _C: 'form-control',

                    },
                    {

                        _E: 'label',

                        _C: 'form-label  mt-2',

                        _V: 'Last Name',

                    },
                    {

                        _E: 'input',

                        _T: 'text',

                        _I: 'txtLastname',

                        _N: 'lastname',

                        _C: 'form-control',

                    },
                    {

                        _E: 'label',

                        _C: 'form-label  mt-2',

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
                        modalTitle: 'Add Student',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'student_list',
                        
                        v2: 'Student added successfully.',
                        
                        v3: '',
                        
                        v4: ''
                }

        __BUILDER(data);

        // PREPARE FETCHING DATA FOR OPTION
        _IV = 'id';

        _OV = 'name';

        d =  JSON.stringify({

            table:'year_lvl',

            column: [_OV,_IV]

        })

        encyptedData1 = encryptData(d,hp);

        data = [

                {
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHDATA/',

                        _ED: encyptedData1,

                        _I: 'txtYear',

                        _IV: _IV,

                        _OV: _OV
                },
                {
                        _E: 'option-selected-value',

                        _FS: 'txtYear'
                }

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
                    
                    v1: 'department_list',
                    
                    v2: 'Clearance requirement deleted successfully.',
                    
                    v3: code,
                    
                    v4: ''
                }

        __BUILDER(data);

    })

  </script>