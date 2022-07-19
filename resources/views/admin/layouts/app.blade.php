<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  @include('admin.layouts.header')
  @yield('content')
  @include('admin.layouts.footer')
</div>


<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')





<script>
  
  $( document ).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });


  @if (Session::has('message'))
  var type = "{{ Session::get('alert-type', 'info') }}"
  switch(type){
      case 'info':

          toastr.options.timeOut = 10000;
          toastr.info("{{Session::get('message')}}");
          var audio = new Audio('audio.mp3');
          audio.play();
          break;
      case 'success':

          toastr.options.timeOut = 10000;
          toastr.success("{{Session::get('message')}}");
          var audio = new Audio('audio.mp3');
          audio.play();

          break;
      case 'warning':

          toastr.options.timeOut = 10000;
          toastr.warning("{{Session::get('message')}}");
          var audio = new Audio('audio.mp3');
          audio.play();

          break;
      case 'error':

          toastr.options.timeOut = 10000;
          toastr.error("{{Session::get('message')}}");
          var audio = new Audio('audio.mp3');
          audio.play();

          break;
  }
  @endif


    //divison
    $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       token = $( "input[value='_token']" ).val();


       $('.edit-division').on('click',function(){
           var id = $(this).attr("data-id");
           data = {
               "_token": token,
               "id":id
           };
           $.ajax({
               url: "division/"+id+'/edit',
               type: "get",
               data:data,
               success: function (response) {
                   // console.log(response);
                   $('.division-form').html(response);
               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
               }
           });
       });
   });

    //district
    $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       token = $( "input[value='_token']" ).val();


       $('.edit-district').on('click',function(){
           var id = $(this).attr("data-id");
           data = {
               "_token": token,
               "id":id
           };
           $.ajax({
               url: "district/"+id+'/edit',
               type: "get",
               data:data,
               success: function (response) {
                   // console.log(response);
                   $('.district-form').html(response);
               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
               }
           });
       });
   });

    //thana
    $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       token = $( "input[value='_token']" ).val();


       $('.edit-thana').on('click',function(){
           var id = $(this).attr("data-id");
           data = {
               "_token": token,
               "id":id
           };
           $.ajax({
               url: "thana/"+id+'/edit',
               type: "get",
               data:data,
               success: function (response) {
                   // console.log(response);
                   $('.thana-form').html(response);
               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
               }
           });
       });
   });

    //union
    $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       token = $( "input[value='_token']" ).val();


       $('.edit-union').on('click',function(){
           var id = $(this).attr("data-id");
           data = {
               "_token": token,
               "id":id
           };
           $.ajax({
               url: "union/"+id+'/edit',
               type: "get",
               data:data,
               success: function (response) {
                   // console.log(response);
                   $('.union-form').html(response);
               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
               }
           });
       });
   });

  //GetDistrict
  var token =  $("input[name=_token]").val();
  function GetDistrict(val){
    var datastr = "division_id=" + val  + "&token="+token;
    $.ajax({
      type: "post",
      url: "{{URL::to('admin/get-district')}}",
      data:datastr,
      cache:false,
      beforeSend: function() {
          // setting a timeout
      },
      success:function (data) {            
        $('#district_id').html(data);

      },
      error: function (jqXHR, status, err) {
        alert(status);
        console.log(err);
      },
      complete: function () {
        // alert("Complete");
      }
    });
  }

  //GetUpazila
  var token =  $("input[name=_token]").val();
  function GetUpazila(val){
    var datastr = "district_id=" + val  + "&token="+token;
    $.ajax({
      type: "post",
      url: "{{URL::to('admin/get-upazila')}}",
      data:datastr,
      cache:false,
      beforeSend: function() {
          // setting a timeout
      },
      success:function (data) {            
        $('#upazila_id').html(data);

      },
      error: function (jqXHR, status, err) {
        alert(status);
        console.log(err);
      },
      complete: function () {
        // alert("Complete");
      }
    });
  }


</script>








</body>
</html>
