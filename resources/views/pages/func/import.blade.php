@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Import from excel</h1>

    </div>

    <div class='t' clas={{$id}}></div>

    {{-- @if ($selectedFilter)

      <div class='r' clas={{$selectedFilter}}></div>
    
    @endif
    --}}


    <div class="container-fluid" >

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
  
    </div>

    <div class="row">

      <div class="col-sm-12">

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


        
            <div class="row">

              <div class="col-sm-4">

                <label for="">Import Data to Table</label>

                <select class="custom-select" name="table" id="txtTables">

                  @foreach ($data as $d)
                  
                    @foreach ($d as $item)

                      <option value="{{$item}}">{{$item}}</option>

                    @endforeach
                    
                      
                  @endforeach
    
                </select>

              </div>

            </div>

            <div class="row">

              <div class="col-sm-12 mt-2">

                <input type="file" class="form-control-file" name="filename">

              </div>

            </div>

            

          
          
            <div class="text-right">

              <button type="submit" class="btn text-light pb-3 pt-0 " style="font-size:9pt; background:#7A353C; height:20px; width:80px">
 
                Add
       
              </button>

            </div>
            
            
          </form>

       

      </div>

    </div>

    
    <div class="row pt-2">
 
      <div class="col-sm-10"></div>
 
      <div class="col-sm-2 text-right">
 
        

      </div>
   
    </div>
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\administrator\clearance') 

  @endsection

  