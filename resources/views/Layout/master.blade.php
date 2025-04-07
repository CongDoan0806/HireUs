<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

  <!-- Link file CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/company.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/companyProfile.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/job_detail.css') }}">


  <!-- Link icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">



</head>
<body>
    @include('Layout.header')

    @yield('content')

    @include('Layout.footer')

    @include('Layout.script')

    @stack('scripts')
</body>
</html>