@php
if (config('myconfig.production')) {
    if(@$public_path=="../"){@$public_path="../public/";}
    else{@$public_path="public/";}
}
@endphp

<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ @$public_path.'plugins/fontawesome-free/css/all.min.css' }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ @$public_path.'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'plugins/icheck-bootstrap/icheck-bootstrap.min.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'plugins/jqvmap/jqvmap.min.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'dist/css/adminlte.min.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'plugins/overlayScrollbars/css/OverlayScrollbars.min.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'plugins/daterangepicker/daterangepicker.css' }}">
<link rel="stylesheet" href="{{ @$public_path.'plugins/summernote/summernote-bs4.min.css' }}">
