<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/font-awesome-icons.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('css/admin-home.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/batch-personel-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/batch-student-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/supplies-inventory.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-medical-supply.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-consultation-record.css')}}">
    <link rel="stylesheet" href="{{asset('css/consultation-record.css')}}">
    <link rel="stylesheet" href="{{asset('css/messaging.css')}}">
    <link rel="stylesheet" href="{{asset('css/appointments.css')}}">
    <!-- Fullcalendar css -->
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">    
    
    <style>
    html,body{
        /* padding: 0;
        margin: 0;
        width: 100%;
        height: 100%; */
        font-family: Arial, Helvetica, sans-serif;
    }
    
    #dot {
        padding: -0px 6px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        color: white;
    }

    .sec{
        position: relative;
        right: -15px;
        top:-20px;
        font-size: 11px;
    }

    .counter.counter-lg {
        top: -35px !important;
    }
    </style>
</head>
<body>

    
    @include('shared.user-header')
    @include('shared.user-sidenav')
    
    @yield('content')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    
    <script src="{{asset('js/data-tables.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>
    <script src="{{asset('js/admin-sidenav.js')}}"></script>
    <script src="{{asset('js/add-health-data.js')}}"></script>
    <script src="{{asset('js/batch-health-data.js')}}"></script>
    <script src="{{asset('js/add-medical-supply.js')}}"></script>
    <script src="{{asset('js/edit-medical-record.js')}}"></script>
    <script src="{{asset('js/add-consultation-record.js')}}"></script>
    <script src="{{asset('js/add-remove-siblingField.js')}}"></script>
    

</body>
</html>