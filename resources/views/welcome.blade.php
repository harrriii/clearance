@extends('layouts.layout_home')

@section('content')

<main class="container-fluid">

  <div class="row">

    <div class="col test"></div>

  </div>
  
  <div class="pricing-header px-3 py-2 pt-md-4 pb-md-4 pb-1 mx-auto text-center">

    <h1 class="display-4">Clearance System</h1>

  </div>

  <div class="row">

    <div class="col-sm-12" >

      <div class="mlqu-color border rounded p-1 text-center text-light">
    
        <h5 id="txtClearanceBanner"></h5>
    
        <small id="txtClearanceDate"></small>
    
        <small id="txtClearanceBatch" no="" hidden=""></small>

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

@include('inc\modal\modals') 
@endsection

@section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\home\clearance') 

@endsection

