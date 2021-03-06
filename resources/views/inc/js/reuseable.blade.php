<script type="text/javascript">

// GLOBAL VARIABLES

    var hp = "mlqu-hash-password-2021";

    var message = 'Subject added successfully.';

    var content = '';

    var d = '';

    var encyptedData = '';

    var footer = '';

    var toAppend = '';

    var x = '';


// ENCRYPT
    var CryptoJSAesJson = {

            stringify: function (cipherParams) {

                var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};

                if (cipherParams.iv) j.iv = cipherParams.iv.toString();
                
                if (cipherParams.salt) j.s = cipherParams.salt.toString();

                return JSON.stringify(j);
            },
           
            parse: function (jsonStr) {

                var j = JSON.parse(jsonStr);

                var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
              
                if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
              
                if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
              
                return cipherParams;
            }

    }

    function encryptData(data, pass=null){

        var encrypted = CryptoJS.AES.encrypt(data, 'mlqu-hash-password-2021', {format: CryptoJSAesJson});

        return btoa(unescape(encodeURIComponent(encrypted.toString())));

    }

// MODAL BUILDER
    // function buildModal(data){

    //     content = '';

    //     console.log(data['uploadModal']);

    //     for (let i = 0; i < data['modalContent'].length; i++) {

    //         if(data['modalContent'][i][0] == 'label')
    //         {
    //             content += form_label(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3]);
    //         }
    //         if(data['modalContent'][i][0] == 'input')
    //         {   
    //             content += form_input(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3],data['modalContent'][i][4],data['modalContent'][i][5],data['modalContent'][i][6],data['modalContent'][i][7]);
    //         }
    //         if(data['modalContent'][i][0] == 'select')
    //         {   
    //             content += form_select(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3]);
    //         }
    //     }

    //     content += form_input('','v1','','',data['v1'],'hidden');

    //     content += form_input('','v2','','',data['v2'],'hidden');
        
    //     content += form_input('','v3','','',data['v3'],'hidden');
        
    //     content += form_input('','v4','','',data['v4'],'hidden');

    //     footer = form_button('btn_submit',data['buttonSubmit'],'btn btn-sm mlqu-color text-light','submit','background:#7A353C;height:25px;width:80px');

    //     footer += form_button('btn_close',data['buttonCancel'],'btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

    //     showModal('modal_univ', data['modalTitle']);

        

    // }

    function showModal(modal, title){

            $('#'+modal+' .modal-title').empty();

            $('#'+modal+' .modal-body .container').empty();

            $('#'+modal+' .modal-footer').empty();

            $('#'+modal+' .modal-title').append(title);

            $('#'+modal).modal('show');

    }

    function formBuild(formId,action,content,footer,enctype=null){
     
        var form = document.getElementById(formId);

        form.action = action;

        $('#'+formId+' .container').append(content);

        $('#'+formId+' .modal-footer').append(footer);

        if( enctype != null ){

            $('#'+formId).attr("enctype",enctype);

        }

    }

// FORM BUILDER
    function __BUILDER(DATA, MODALNAME='modal_univ'){

        content = '';

        for (let i = 0; i < data['modalContent'].length; i++) {

            content += __CONTENTBUILDER(data['modalContent'][i]);

        }

        console.log(content)

        content += form_input('','v1','','',data['v1'],'hidden');

        content += form_input('','v2','','',data['v2'],'hidden');
        
        content += form_input('','v3','','',data['v3'],'hidden');
        
        content += form_input('','v4','','',data['v4'],'hidden');

        content += form_input('','v5','','',data['v5'],'hidden');

        content += form_input('','mi','','',data['mi'],'hidden');

        footer = form_button('btn_submit',data['buttonSubmit'],'btn btn-sm mlqu-color text-light','submit','background:#7A353C;height:25px;width:80px');

        footer += form_button('btn_close',data['buttonCancel'],'btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

        showModal(MODALNAME, data['modalTitle']);

        formBuild('form_univ',data['url'],content,footer,data['v6']);

    }

    function __CONTENTBUILDER(DATA){ 
        
        if( DATA['_E'] == 'input' ){

            output = '<input ';

            if ('_T' in DATA) {
                
                output += 'type = "'+DATA['_T']+'" ';

            }

            if ('_C' in DATA) {
                
                output += 'class = "'+DATA['_C']+'" ';

            }

            if ('_N' in DATA) {
                
                output += 'name = "'+DATA['_N']+'" ';

            }

            if ('_I' in DATA) {
                
                output += 'id = "'+DATA['_I']+'" ';

            }

            if ('_P' in DATA) {
                
                output += 'placeholder = "'+DATA['_P']+'" ';

            }

            if ('_A' in DATA) {
                
                output += DATA['_A']+' ';

            }

            if ('_V' in DATA) {
                
                output += 'value = "'+ DATA['_V']+'"';

            }

            output += '/>'

            if( DATA['_C'] == 'custom-file-input'){

                output += '<label class="custom-file-label" for="'+DATA['_I']+'">'+DATA['_CL']+'</label>';

                divoutput = '<div class="input-group mb-3"><div class="custom-file">';
                
                divoutput += output;

                divoutput += '</div></div>';

                return divoutput;

            }
            else{

                return output;

            }

        }

        if( DATA['_E'] == 'textarea' ){

            output = '<textarea ';

            if ('_C' in DATA) {
                
                output += 'class = "'+DATA['_C']+'" ';

            }

            if ('_N' in DATA) {
                
                output += 'name = "'+DATA['_N']+'" ';

            }

            if ('_I' in DATA) {
                
                output += 'id = "'+DATA['_I']+'" ';

            }

            if ('_P' in DATA) {
                
                output += 'placeholder = "'+DATA['_P']+'" ';

            }

            if ('_R' in DATA) {
                
                output += 'rows = "'+DATA['_R']+'" ';

            }

            if ('_A' in DATA) {
                
                output += DATA['_A'];

            }

            output += '>';

            if ('_V' in DATA) {
                
                output +=  DATA['_V'];

            }

            output += '</textarea>'

            return output;

        }

        if( DATA['_E'] == 'label' ){

            output = '<label ';

            if ('_C' in DATA) {

                output += 'class = "'+DATA['_C']+'"> ';

            }
            if('_V' in DATA ) {

                output += DATA['_V']+' </label>';

            }

            return output;
        }

        if( DATA['_E'] == 'select' ){

            output = '<select ';

            if ('_C' in DATA) {

                output += 'class = "'+DATA['_C']+'" ';

            }

            if ('_I' in DATA) {

                output += 'id = "'+DATA['_I']+'" ';

            }

            if('_N' in DATA ) {

                output += 'name = "'+DATA['_N']+'">';

            }

            output += '</select>';

            return output;
        }

    }
    function __ADDTL(DATA){

        for (let i = 0; i < DATA.length; i++) {
         
            if( DATA[i]['_E'] == 'option'){

                output = '<option ';

                if ('_IV' in DATA[i] ) {

                    output += 'value = "'+DATA[i]['_IV']+'"> ';

                }
                if('_OV' in DATA[i] ) {

                    output += DATA[i]['_OV']+' </option>';

                }

                $( '#'+DATA[i]['_FS'] ).append(output);

            }
            if( DATA[i]['_E'] == 'option-fetch-value'){

                elementId = '#'+ DATA[i]['_I'];

                output = '' ;

                $.ajax({

                        url: DATA[i]['_U']+DATA[i]['_ED'],

                        dataType: 'json',

                        async: false,

                        data: '',

                        success: function(data) {

                            var jsonData = JSON.stringify( data );

                            $.each(JSON.parse( jsonData ), function(key, val){

                                output += '<option value="'+val[DATA[i]['_IV']]+'">'+val[DATA[i]['_OV']]+'</option>'

                            })

                            $(elementId).empty();

                            $(elementId).append(output);

                        }

                });

            }
            if( DATA[i]['_E'] == 'option-selected-value'){

                document.getElementById( DATA[i]['_FS'] ).value =  DATA[i]['_SV'];

            }
            
        }

    }

    function form_label(id,content,t_class){

        return '<label class="'+t_class+'">'+content+'</label>'; 

    }
    function form_input(id,name,placeholder,t_class,value,attr='',type=''){

       return '<input type="'+type+'" class="'+t_class+'" name="'+name+'" id="'+id+'" placeholder="'+placeholder+'" '+attr+' value="'+value+'"/>'; 
    
    }
    function form_select(id, name,  t_class){

        var output = '';
        
        output = '<select class="'+t_class+'" id="'+id+'" name="'+name+'">'
            
        output += '</select>';

        return output;

    }
    function form_button(id,name,t_class,type,style='',attr=''){

        return '<button type="'+type+'" class="'+t_class+'" id="'+id+'" style="'+style+'" '+attr+'>'+name+'</button>';

    }

// FORM COMPLEX
    function form_option(url,selectid,input,column=null,code=null,selected=null,addtl=null){

        var content = '';

        if(addtl){
            content += addtl;

            $('#'+selectid).empty();
            $('#'+selectid).append(content);
            
            if(selected){
                document.getElementById(selectid).value = selected;
            }
        }
            
        $.getJSON(url+input, function(data) {

            var jsonData = JSON.stringify(data);

            $.each(JSON.parse(jsonData), function(key, val){
                
                content += '<option value="'+val[code]+'">'+val[column]+'</option>'

            })

            $('#'+selectid).empty();
            $('#'+selectid).append(content);

            if(selected){
                document.getElementById(selectid).value = selected;
            }

        })
       
    }
    
// GET DATA FUNCTIONS
    function fetchGetJSON( input, callback ){

        // $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {
                    
        // }

        $.getJSON(input['url']+input['data'], function(data) {
            
            callback(data)

        })


		// $.ajax({

		// 	type: 'POST',
		// 	data: input,
		// 	url: url,
		// 	dataType: 'json',
		// 	success: function( res ){

                
               

		// 		// if( plain_data == 'Y' ){

		// 		// 	// callback( res );

				

		// 		// }
		// 	},
        //   	error: function(XMLHttpRequest, textStatus, errorThrown){

        //     	console.log(XMLHttpRequest.responseText);

        //     	callback('');
        //   	}
		// });

	}

// APPEND TO 
    function appendToTable(id, data, from=null){

        toAppend = '';
       
        if(from == 'homeEnlistment'){
            
            $.each(data, function(key,val){
                
                toAppend += '<tr>'
                +'<td><input type="checkbox" prerequisite="'+val[4]+'" code="'+val[0]+'" subject="'+val[1]+'" unit="'+val[3]+'" class="chkSubject" id="chk'+val[0]+'"aria-label="s"> </td>'
                +'<td>'+val[1]+'</td>'
                +'<td>'+val[4]+'</td>'
                +'<td>'+val[3]+'</td>'
                +'</tr>';
            })
        }

        $('#'+id+' tbody').empty();
        $('#'+id+' tbody').append(toAppend);
    }



// fill TABLE 
    function fillModalTable(input){

        console.log(input)
        $.getJSON('/UNIV/FETCHDATA/'+ input['d'] , function (data) {




        })
    }

// TEMPLATES





// DATE FUNCTION    

    function getDateNow(){

        var today = new Date();

        var dd = String(today.getDate()).padStart(2, '0');

        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        
        var yyyy = today.getFullYear();

        today =   yyyy + '/'  + mm  + '/' + dd ;

        return today;
    }
    function formatDateMDY(date){

        date = new Date(date);

        const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date);

        const mo = new Intl.DateTimeFormat('en', { month: 'long' }).format(date);

        const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date);
        
        return mo+' '+da+', '+ye;

    }

    function dateCheck(from,to,check) {

        var fDate,lDate,cDate;

        fDate = Date.parse(from);

        lDate = Date.parse(to);

        cDate = Date.parse(check);

        if(cDate <= lDate || cDate >= fDate || cDate == lDate || cDate == fDate) {

            return true;

        }

        return false;
    }



// SEARCH FUNCTION
function addSearch(txtSearch, table){

    $("#"+txtSearch).keyup(function () {

    var value = this.value.toLowerCase().trim();

    $("#"+table+" tr").each(function (index) {

        if (!index) return;

        $(this).find("td").each(function () {

            var id = $(this).text().toLowerCase().trim();

            var not_found = (id.indexOf(value) == -1);

            $(this).closest('tr').toggle(!not_found);

            return not_found;
        
            });
        });
    });
}



$('.__printReport').click('',function ()  {
    alert('Currently not available.')

})


$('.working').click('',function ()  {

    alert('Currently not available.')
    })






$( ".icon" )
.mouseover(function() {

    $(this).css('transform','scale(1.2)');
    $(this).css('background','#7A353C !important');



})
.mouseout(function() {

    $(this).css('transform','scale(1)');
    $(this).css('background','#7A353C !important');

});

$(document.body).ready(function(){
        
    $(".alert-close").delay(1500).slideUp(500);

})

</script>


{{-- 

    cheat scripts
    
    **** FOR MODAL ****

    label
        {
                _E: 'element',

                _C: 'class',

                _V: 'value',
        },

    input
        {
                _E: 'element',

                _T: 'type',

                _I: 'id',

                _N: 'name',

                _P: 'placeholder',

                _C: 'class',

                _V: 'value',

                _A: 'attribute array'
        },

    option
        {
                _E: 'element',

                _IV: 'inner value',

                _FS: 'for select',

                _OV: 'outer value',
        },
    set selected option
        {
            _E: 'option-selected-value',

            _FS: 'for select',

            _SV: 'selected value',
        }




    **** FOR MODAL ****



    ****JS GET JSON****
    d = {   
            t: 
            c:  [     
                  
                ],
            j:  [
                    ['', '', '', ''],
                ],
            w:  [
                    ['', '', '']
                ],
            g:
            
            o = '';

            lj =    [
                        ['', '', '', ''],
                    ],;

            wo =    [
                        ['', '', '']
                    ];
        }

    d = JSON.stringify(d);

    encyptedData = encryptData(d,hp);

    $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {
        
       some code here..

    })

    ****JS GET JSON****



    ****CHECK IF OBJ IS UNDEFINED**** 

    if( typeof res[0] === "undefined" )
    {
        console.log('test');
    }
    else
    {
        console.log('try');
    }

    ****CHECK IF OBJ IS UNDEFINED**** 
    


    ****CREATE JS FUNCTION WITH CB**** 

    function getClearance(callback){

    }

    getClearance(function (res){

    }

    ****CREATE JS FUNCTION WITH CB**** 
    



    ****MULTI INPUT*** 

    multiInput =  JSON.stringify({

        _T: 'PK-INPUT',

        _TC: 'Sheet_no', (OPTIONAL)

        _D: selectedSheets

    })

    multiInput = encryptData(multiInput,hp);

    _T: 
    *PK-INPUT - Kapag kailangan idefine yung pag iinputan na Column
    *PK- Kapag hindi na kailangan idefine yung pag iinputan na Column

    _TC: Column


    ****MULTI INPUT*** 










--}}