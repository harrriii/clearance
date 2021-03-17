
<script type="text/javascript">

    var selectedSubject = [];

    $( ".icon" ).mouseover(function() {
        $(this).css('transform','scale(1.2)');
    })
    .mouseout(function() {
        $(this).css('transform','scale(1)');
    });
    
    function setBanner(startDate,endDate,ClearanceNo)
    {

        if(dateCheck(startDate,endDate,getDateNow())){

            $('#txtClearanceBanner').text('Clearance is now open!');

            $('#txtClearanceDate').text("("+formatDateMDY(startDate)+" - "+formatDateMDY(endDate)+")");

            $('#txtClearanceBatch').attr('no',ClearanceNo);

            $('#btn_select').attr('no',ClearanceNo);

            $('.pageContent').removeAttr('hidden');

            addSearch("txtStudentSearch","tbl_studentSearch");

            addSearch("txtSearchMajor","tbl_major");

            addSearch("txtSearchMinor","tbl_minor");

            addSearch("txtSearchOther","tbl_other");

            $(".alert").delay(2000).slideUp(300);
            
            $('#nv_dashboard').addClass('active');

            $('#nv_student').removeClass('active');

            $('#nv_schedule').removeClass('active');
        }
        else{

            $('#txtClearanceBanner').text('Clearance is now closed.');

            $('#txtClearanceDate').text('Wait for further announcement.');

        }
       
    }

    $(document.body).ready(function(){

        getClearance(function (data){
            
            if( typeof data[0] === "undefined" )
            {

                $('#txtClearanceBanner').text('Clearance is now closed.');

                $('#txtClearanceDate').text('Wait for further announcement.');

            }
            else
            {

                setBanner(data[0].startDate,data[0].endDate,data[0].id)

            }
            
        })

    })

    function getClearance(callback)
    {
        d = {   
              
                table:  'clearance_batch',
                
                column: [     
                
                            'id',
                            'startDate',
                            'endDate'
                
                        ],
            
                where:  [
                
                        ['status', '=', 'Open']
                    
                    ]
            }
        

        d = JSON.stringify(d);

        encyptedData = encryptData(d,hp);

        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {
            
            return callback(data)

        })


    }

    

  

</script>