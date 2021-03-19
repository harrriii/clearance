@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container-fluid mt-1 px-0 py-1">

      <div class="row">

        <div class="col-sm-12">

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">

            <h1 class="h2" style="font-size: 15pt">Clearance</h1>
      
          </div>
        
        </div>
      
      </div>

      <div class="row">

        <div class="col-sm-12 py-1 pt-0" style="font-size:10pt;">

          <nav aria-label="breadcrumb" >
          
            <ol class="breadcrumb py-1" style="background:#F9EFEF">
          
              <li class="breadcrumb-item">
                
                <a href="/dashboard" class="item-active font-weight-bold">Clearance Sheet</a>
            
              </li>
          
              <li class="breadcrumb-item">
            
                <a href="/dashboard/student/clearance/information" class="text-secondary">Clearance Information</a>
            
              </li>
          
            </ol>
        
          </nav>

        </div>

      </div>

    </div>

    <div class='t' clas={{$id}}></div>

    <div class="container-fluid" >

     

      @if($hasClearance)

        @if(!$hasSheet)

          <div class="row">

            <div class="col p-0">
              
              <div class="alert text-center" style="background: #F9EFEF; border: solid 1px #AE3032" role="alert">
     
                <h6 class="font-weight-bold p-1">Clearance is ongoing</h6>
     
                <small class="font-weight-bold p-1">Please update your clearance sheet</small>
     
              </div>
            
            </div>
        
          </div>

          <div class="border rounded p-4 mb-3">
            
            <div class="row">
    
              <div class="col-sm-12">
                
                <form action={{ url('/UNIV/INSERT') }}  method="post">
      
                  {{ csrf_field() }}
      
                    <div class="row">
                    
                      <div class="col-sm-12">
                        
                        <label>Student Id</label>
      
                        <input type="text" id="txtStudentId" name="student_id" class="form-control p-2" value="{{$studentId}}" style="font-size:9pt;" readonly>
                    
                      </div>
                    
                    </div>
      
                    <div class="row">
      
                      <div class="col-sm-12 pt-2">
                        
                        <label>Clearance Batch</label>
      
                        <input type="text" class="form-control p-2" name="batch" value="{{$clearanceBatch}}" id="txtClearanceBatch" style="font-size:9pt;"  readonly>
                      
                      </div>
      
                    </div>
      
                    <div class="row">
      
                      <div class="col-sm-12">
      
                        <label class="mt-2">Section</label>
      
                        <input type="text" id="txtSection" name="section" value="" class="form-control p-2" style="font-size:9pt;" >
                      
                      </div>
                      
                    </div>
      
                    <div class="row">
      
                      <div class="col-sm-12">
      
                        <label class="mt-2">Year</label>
      
                        <select class="form-control" name="year" id="">

                          @foreach ($year as $y)

                            <option value="{{$y->id}}">{{$y->name}}</option>
                              
                          @endforeach
      
                        </select>
      
                      </div>
      
                    </div>
      
                    <div class="row">
      
                      <div class="col-sm-12">
      
                        <label class="mt-2">Campus</label>
      
                        <select class="form-control" name="campus" id="">
      
                          @foreach ($campus as $c)

                            <option value="{{$c->id}}">{{$c->name}}</option>
                              
                          @endforeach
      
                        </select>
                    
                      </div>
      
                    </div>

                    <input type="text" name="v1" value="clearance_sheet" hidden>
                    
                    <input type="text" name="v2" value="Clearance requirement added successfully." hidden>


                    <div class="row pt-3">
          
                      <div class="col-sm-10"></div>
                
                      <div class="col-sm-2 text-right ">
                
                        <button type="submit" class="btn text-light pb-2 pt-0  __sign" style="font-size:9pt;background:#7A353C;height:20px;width:80px">
                
                          Update
              
                        </button>
                  
                      </div>
  
                </form>
          
              </div>
      
            </div>
                    
          </div>

        </div>

        @else

          <div class="row">

            <div class="col p-0">
              
              <div class="alert text-center" style="background: #F9EFEF; border: solid 1px #AE3032" role="alert">
      
                <h6 class="font-weight-bold p-1">Clearance is ongoing</h6>
      
                <small class="font-weight-bold p-1">Your clearance sheet is updated. Go to clearance information</small>
      
              </div>
            
            </div>
        
          </div>

          @if(session()->has('success-message'))
  
            <div class="row">
        
              <div class="col">
        
                <div class="alert alert-success">
        
                  {{ session()->get('success-message') }}
        
                </div>
        
              </div>
    
            </div>
      
          @endif
      
          @if(session()->has('fail-message'))
      
            <div class="row">
        
              <div class="col">
        
                <div class="alert alert-danger">
        
                  {{ session()->get('fail-message') }}
        
                </div>
        
        
              </div>
        
            </div>
      
          @endif

          <div class="row">
    
            <div class="col-sm-12 border rounded p-4 mb-4">
              
              <form action="{{ url('/dashboard/student/clearancesheet') }}"  method="post">
    
                {{ csrf_field() }}
    
                @foreach ($data as $d)
                    
                  <div class="row">
                  
                    <div class="col-sm-12">
                      
                      <label>Student Id</label>
    
                      <input type="text" id="txtStudentId" name="student_id" class="form-control p-2" value="{{$d->student_id}}" style="font-size:9pt;" readonly>
                  
                    </div>
                  
                  </div>
    
                  <div class="row">
    
                    <div class="col-sm-12 pt-2">
                      
                      <label>Clearance Batch</label>
    
                      <input type="text" class="form-control p-2" name="batch" value="{{$d->batch}}" id="txtClearanceBatch" style="font-size:9pt;"  readonly>
                    
                    </div>
    
                  </div>
    
                  <div class="row">
    
                    <div class="col-sm-12">
    
                      <label class="mt-2">Section</label>
    
                      <input type="text" id="txtSection" name="section" value="{{$d->section}}" class="form-control p-2" style="font-size:9pt;" >
                    
                    </div>
                    
                  </div>
    
                  <div class="row">
    
                    <div class="col-sm-12">
    
                      <label class="mt-2">Year</label>
    
                      <select class="form-control" name="year" id="">
    
                        <option value="{{$d->year}}">{{$d->yearname}}</option>
    
                      </select>
    
                    </div>
    
                  </div>
    
                  <div class="row">
    
                    <div class="col-sm-12">
    
                      <label class="mt-2">Campus</label>
    
                      <select class="form-control" name="campus" id="">
    
                        <option value="{{$d->campus}}">{{$d->campusname}}</option>
    
                      </select>
                  
                    </div>
    
                  </div>
    
                @endforeach
    
              </form>
    
            </div>
            
          </div>

        @endif

      @endif
 
      
      
    
   
    
   
    </div>
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\staff\clearance') 

  @endsection

  