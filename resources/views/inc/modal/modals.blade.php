<!-- Modal -->
<div class="row">
  <div class="col">
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_studentSearch"  >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Student Search</h5>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-7"></div>
                <div class="col-sm-5">
                  <input class="form-control form-control-sm text-right mb-2" type="text" id="txtStudentSearch" placeholder="Search">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <table class="table table-striped" id="tbl_studentSearch">
                    <thead style="font-size: 10pt; ">
                        <tr >
                            <th scope="col" width="10%"></th>
                            <th scope="col" width="30%">Student No</th>
                            <th scope="col" class="text-center" width="60%">Name</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 9pt"></tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mlqu-color text-light" style="height: 30px; font-size:9pt;" data-dismiss="modal" id="btn_select">Select</button>
            <button type="button" class="btn mlqu-color text-light" style="height: 30px; font-size:9pt;" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@php
    
  $formAttr = array(
                      'action' => 'App\Http\Controllers\StudentRegistrationController@store',
                      'method' => 'POST',
                      'class' => 'needs-validation',
                      'novalidate' => ''
                    );

  $textRequireAttr = array(
                            'class' => 'form-control', 
                            'required' => ''
                          );

  $textRequireDataPickerAttr = array(
    'class' => 'form-control', 
    'required' => '',
    'data-provide' => 'datepicker',
    'autocomplete' => 'off'
  );

  $textAttr = array(
    'class' => 'form-control'
  );

  $customSelectRequireAttr = array(
    'class' => 'custom-select form-control',
    'require' =>''
  ); 
  $buttonSubmitAttr = array(
    'class' => 'btn btn-sm mlqu-color',
    'style' => 'background:#7A353C;height:25px;width:80px'
  );

@endphp

    
<!-- Add Modal -->
  <div class="modal fade" id="modal_univ" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-light py-1" style="background:#7A353C;">
          <h5 class="modal-title " style="font-size:12pt;"></h5>
        </div>

        {!!
            Form::open(['id'=>'form_univ']);
        !!} 

          <div class="modal-body">
            <div class="container">

         

            </div>
          </div>
          <div class="modal-footer">

          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="modal_univ_upload" aria-hidden="true">

    <div class="modal-dialog">
      
      <div class="modal-content">

        <div class="modal-header text-light py-1" style="background:#7A353C;">

          <h5 class="modal-title " style="font-size:12pt;"></h5>

        </div>

          <div class="modal-body">

            <div class="container">

              <form action="{{ url('/dashboard/import') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
      
                @if ( session('errors'))
      
                  <div class="alert alert-danger">
      
                    @foreach ($errors as $error)
          
                      {{ $error }}
            
                    @endforeach
      
                  </div>
      
                @endif
      
                @if ( session('success'))
      
                  <div class="alert alert-success">
      
                    {{ session('success') }}
                    
                  </div>
      
                @endif
      
                <input type="file" class="form-control-file" name="filename">
      
              
                <div class="text-right">
      
                  <button type="submit" class="btn text-light pb-3 pt-0 " style="font-size:9pt; background:#7A353C; height:20px; width:80px">
      
                    Add
           
                  </button>
      
                </div>
                
              </form>

            </div>

          </div>

          <div class="modal-footer">

          </div>
 
      </div>

    </div>

  </div>







  <!-- Add Modal -->
  <div class="modal fade" id="modal_univ_lg" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-light py-1" style="background:#7A353C;">
          <h5 class="modal-title " style="font-size:12pt;"></h5>
        </div>

        {!!
            Form::open(['id'=>'form_univ']);
        !!} 

          <div class="modal-body">
            <div class="container overflow-auto" style="max-height:350px;"> 

         

            </div>
          </div>
          <div class="modal-footer">

          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>


