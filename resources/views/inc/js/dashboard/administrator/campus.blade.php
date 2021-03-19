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

                        _V: 'Campus Id',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtDepartment',

                        _N: 'id',

                        _C: 'form-control',

                        _A: 'Readonly',

                        _V: code,

                    },
                    {
                        _E: 'label',

                        _C: 'form-label pt-2',

                        _V: 'Campus name',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtCampusName',

                        _N: 'name',

                        _C: 'form-control',
                        
                        _V: name
                    }
                   
            ]


        id = [code];

        d = JSON.stringify({
            id
        })

        id = encryptData(d,hp);

        data =  {
                        modalTitle: 'Edit Campus',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'campus_list',
                        
                        v2: 'Campus updated successfully.',
                        
                        v3: id,
                        
                        v4: '',

                        mi:''
                }

        __BUILDER(data);

    })

    $('.__add').click('',function ()  {

        startedBy = $('.t').attr('clas');

        content = [
                    {
                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Campus name',

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtCampusName',

                        _N: 'name',

                        _C: 'form-control',
                        
                    }
                   
            ]

        data =  {
                        modalTitle: 'Add Campus',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'campus_list',
                        
                        v2: 'Campus added successfully.',
                        
                        v3: '',
                        
                        v4: '',

                        mi: '',

                }

        __BUILDER(data);
    })

    $('body').on('click', '.__delete', function () {

        code = $(this).attr('code');

        id = [code];

        d = JSON.stringify({
            _D: id
        })

        id = encryptData(d,hp);

        content = [
                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Do you want to delete this item?',

                    },
                   
                ]

        data =  {
                        modalTitle: 'Delete Campus',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/DELETE',
                        
                        v1: 'campus_list',
                        
                        v2: 'Campus deleted successfully.',
                        
                        v3: id,
                        
                        v4: ''
                }

        __BUILDER(data);

    })
 
    
  </script>