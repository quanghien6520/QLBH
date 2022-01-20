<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <script src="{{asset('js/jquery.min.js')}}"></script>
</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body>
<!-- BEGIN: Content-->
     @yield('content')
<!-- END: Content-->
@yield('scripts')
</body>
<!-- END: Body-->
</html>
