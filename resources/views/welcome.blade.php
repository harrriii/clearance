@extends('layouts.layout_home')

@section('content')

<main class="container-fluid">

  <div class="row">

    <div class="col test"></div>

  </div>
  
  <div class="pricing-header px-3 py-3 pt-md-4 pb-md-4 mx-auto text-center">

    <h1 class="display-4">Clearance System</h1>

  </div>



  <div class="row">
    <div class="col-sm-10 pt-md-1 pr-0 text-right">
        <label>Search</label>
    </div>
    <div class="col-sm-2 text-right">
        <input type="text" class="form-control" style="font-size:9pt">
    </div>
  </div>

  <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive-lg mt-2" style="white-space:nowrap;">
    
            <table class="table table-striped">
      
              <thead>
      
                <tr>
      
                  <th class="text-center py-2" style="font-size: 9pt !important;" >Student Id</th>
  
                  <th class="text-center py-2" style="font-size: 9pt !important;" >Student Name</th>

                  <th class="text-center py-2" style="font-size: 9pt !important;" >Department</th>

                  <th class="text-center py-2" style="font-size: 9pt !important;" >Status</th>

                  <th class="text-center py-2" style="font-size: 9pt !important;" >Remarks</th>
               
                </tr>
            
              </thead>
            
              <tbody>
                
                @foreach ($data as $d)

                <tr >
        
                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->student_id}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->firstname.' '.$d->middlename.' '.$d->lastname}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->department}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->status}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->remarks}}</td>

                </tr>
  
              @endforeach
              
  
              
    
              </tbody>
    
            </table>
    
          </div>
      </div>
  </div>


  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Cool stuff</a></li>
          <li><a class="link-secondary" href="#">Random feature</a></li>
          <li><a class="link-secondary" href="#">Team feature</a></li>
          <li><a class="link-secondary" href="#">Stuff for students</a></li>
          <li><a class="link-secondary" href="#">Another one</a></li>
          <li><a class="link-secondary" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Resource</a></li>
          <li><a class="link-secondary" href="#">Resource name</a></li>
          <li><a class="link-secondary" href="#">Another resource</a></li>
          <li><a class="link-secondary" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">School</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
        </ul>
      </div>
    </div>
  </footer>
</main>
@endsection