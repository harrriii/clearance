<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

    })
  
    $('.__add').click('',function ()  {

        startedBy = $('.t').attr('clas');

        content = [
                    {

                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Template Name',

                    },
                    {

                        _E: 'input',

                        _T: 'text',

                        _I: 'txtTemplateName',

                        _N: 'templateName',

                        _C: 'form-control',
                    
                    },
                    {

                        _E: 'label',

                        _C: 'form-label mt-2',

                        _V: 'Upload Template',

                    },
                    {

                        _E: 'input',

                        _T: 'file',

                        _I: 'txtFilename',

                        _N: 'filename',

                        _C: 'custom-file-input',

                        _CL: 'Choose File...',

                    },
                    
                   
            ]



        data =  {
                        modalTitle: 'Add Excel Template',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'excel_templates',
                        
                        v2: 'Template added successfully.',
                        
                        v3: '',
                        
                        v4: '',

                        v5: '/excel/',

                        v6: 'multipart/form-data',

                        mi: ''


                                
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
                        modalTitle: 'Delete Template',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/DELETE',
                        
                        v1: 'excel_templates',
                        
                        v2: 'Template deleted successfully.',
                        
                        v3: id,
                        
                        v4: '',
                    
                }

        __BUILDER(data);

    })

   
 
    
  </script>