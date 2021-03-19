@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container-fluid mt-1 px-0 py-1">

      <div class="row">

        <div class="col-sm-12">

          <div class='t' clas={{$id}}></div>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">

            <h1 class="h2" style="font-size: 15pt">Students</h1>
      
          </div>
        
        </div>
      
      </div>

      <div class="row">

        <div class="col-sm-12 py-1 pt-0" style="font-size:10pt;">

          <nav aria-label="breadcrumb" >
          
            <ol class="breadcrumb py-1" style="background:#F9EFEF">
          
              <li class="breadcrumb-item">
                
                <a href="/dashboard" class="item-active font-weight-bold">Student List</a>
            
              </li>
          
              <li class="breadcrumb-item">
            
                <a href="/dashboard/librarian/students/sheets" class="text-secondary">Student Sheets</a>
            
              </li>

              <li class="breadcrumb-item">
            
                <a href="/dashboard/librarian/students/required"  class="text-secondary">Required Students</a>
            
              </li>

              <li class="breadcrumb-item">
            
                <a href="/dashboard/librarian/students/completed"  class="text-secondary">Completed</a>
            
              </li>
          
            </ol>
        
          </nav>

        </div>

      </div>

    </div>

    @if ($selectedFilter)

      <div class='r' clas={{$selectedFilter}}></div>
    
    @endif

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

    <div class="row" >

      <div class="col-sm-10 text-right mr-0 pr-0">

        <label class="mt-2 font-weight-bold" style="font-size: 9pt;">Search</label>

      </div>

      <div class="col-sm-2 pb-2">

        <input type="text" class="form-control" id="studentSearch" style="font-size:9pt;"">

      </div>

    </div>
   
    <div class="row">
    
      <div class="col-sm-12">
    
        <div class="table-responsive-lg" style="white-space:nowrap;">
    
          <table class="table table-striped" id="studentTable">
    
            <thead>
    
              <tr>

                <th class="text-center py-2" style="font-size: 9pt !important;" >No</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" >Student Id</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" >Name</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" >Year</th>

                {{-- <th class="text-center py-2" style="font-size: 9pt !important;" ></th> --}}
             
              </tr>
          
            </thead>
          
            <tbody>
              
              @php

                  $count = 1;

              @endphp

              @foreach ($data as $d)

                <tr>
        
                  <td style="font-size: 8pt !important;" class="text-center py-2">{{$count}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-2">{{$d->student_id}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-2">{{$d->firstname. ' ' .$d->middlename. ' ' .$d->lastname}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-2">{{$d->name}}</td>

                  {{-- <td class="text-center py-1">

                    <a style="color:#7A353C;" code={{$d->student_id}}  class="a_icon __edit"><i data-feather="edit" class="icon"></i></a>
        
                    <a style="color:#7A353C;" code={{$d->student_id}}  class="a_icon __delete"><i data-feather="trash-2" class="icon"></i></a>
        
                  </td> --}}
        
                </tr>

                @php
                    $count++
                @endphp
  
              @endforeach
  
            </tbody>
  
          </table>
  
        </div>
  
      </div>
      
    </div>
    
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\librarian\student') 

  @endsection

  