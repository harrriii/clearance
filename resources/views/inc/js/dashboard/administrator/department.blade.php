<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

    })

    $('.__edit').click('',function ()  {

        var code = $(this).attr('code');

        var name = $(this).attr('name');

        id = [code];

        d = JSON.stringify({
            id
        })

        id = encryptData(d,hp);

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Department Id',

                    },
                    {

                        _E: 'input',

                        _T: 'text',

                        _I: 'txtDepartment',

                        _N: 'id',

                        _C: 'form-control',
                        
                        _A: 'ReadOnly',

                        _V: code,

                    },
                    {

                        _E: 'label',

                        _C: 'form-label pt-2',

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
                        
                        v3: id,
                        
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

                        _V: 'Department',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtDepartment',

                        _N: 'name',

                        _C: 'form-control',

                    },
            ]

        data =  {
                        modalTitle: 'Add Department',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'department_list',
                        
                        v2: 'Department added successfully.',
                        
                        v3: '',
                        
                        v4: '',

                        mi: '',
                }

        __BUILDER(data);


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