<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>
        
        @include('inc/func/header')
       
    </head>
    <body>

        @include('inc/nav/dashboard')

            @if ($role == 'Staff')
                
                @include('inc/sidebar/staff/dashboard')

            @endif

            @if ($role == 'Student')
                
                @include('inc/sidebar/student/dashboard')

            @endif

            @if ($role == 'Administrator')
                
                @include('inc/sidebar/administrator/dashboard')

            @endif

            @if ($role == 'Librarian')
                
                @include('inc/sidebar/librarian/dashboard')

            @endif

            
        

        @include('inc/func/footer')

        @yield('script')
        

    </body>
</html>
