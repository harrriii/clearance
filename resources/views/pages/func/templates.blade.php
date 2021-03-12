@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Excel Templates</h1>

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


    {{-- <div class="row" >

      <div class="col-sm-10 text-right mr-0 pr-0">

        <label class="mt-2 font-weight-bold" style="font-size: 9pt;">Filter</label>

      </div>

      <div class="col-sm-2 pb-2">

        <select class="form-control __filter" style="font-size: 9pt;" id="txtFilter">

          <option value="*" >All</option>
          
          @foreach ($filter as $f)

            @if ($selectedFilter == $f->id)

              <option value="{{$f->id}}" selected>{{$f->name}}</option>
                
            @else

              <option value="{{$f->id}}">{{$f->name}}</option>

            @endif

          @endforeach
        
        </select>

      </div>

    </div>  --}}
   
    <div class="row">
    
      <div class="col-sm-12">
    
        <div class="table-responsive-lg" style="white-space:nowrap;">
    
          <table class="table table-striped">
    
            <thead>
    
              <tr>
    
                <th class="text-center py-2" style="font-size: 9pt !important;" >No</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" >Template Name</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" >File Name</th>

                <th class="text-center py-2" style="font-size: 9pt !important;" ></th>
             
              </tr>
          
            </thead>
          
            <tbody>
              
              @php

                  $count = 1;

              @endphp

              @foreach ($data as $d)

                <tr>
        
                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$count++}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->templateName}}</td>

                  <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->filename}}</td>

                  <td class="text-center py-1">

                    <a style="color:#7A353C;" href="{{ url('/excel/'.$d->filename) }}" class="a_icon"><i data-feather="download" class="icon"></i></a>

                    <a style="color:#7A353C;" code={{$d->id}}  class="a_icon __delete"><i data-feather="trash-2" class="icon"></i></a>
        
                  </td>
        
                </tr>
  
              @endforeach
  
            </tbody>
  
          </table>
  
        </div>
  
      </div>
      
    </div>
    
    <div class="row pt-2">
 
      <div class="col-sm-10"></div>
 
      <div class="col-sm-2 text-right">
 
        <button type="button" class="btn text-light pb-3 pt-0 __add" style="font-size:9pt; background:#7A353C; height:20px; width:80px">
 
          Add
 
        </button>
   
      </div>
   
    </div>
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\func\templates') 

  @endsection

  