<!DOCTYPE html>


@if(App::getLocale() == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif

<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Dashboard</title>



    <!-- Bootstrap Core CSS -->

    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">



    <!-- MetisMenu CSS -->

   <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom CSS -->

    <link href="{!! asset('theme/css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">

     <!-- This page plugin CSS for datatable -->
    <link href="{{ asset('app-assets/assets/css/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/assets/css/datatables.net-bs4/css/responsive.dataTables.min.css') }}">



    <!-- Morris Charts CSS -->





    <!-- Custom Fonts -->



<style>
    [dir="rtl"] .align-right {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] label {
        text-align: right;
        float: right;
        /*background: red;*/
    }
    [dir="rtl"] h2 {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }

    [dir="rtl"] h1 {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] p {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] h3 {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] th {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] td {
        text-align: right;
        /*float: right;*/
        /*background: red;*/
    }
    [dir="rtl"] .drop-menu{
        margin-left: 7em !important;
    }
    @media screen and (min-width: 900px) {
        [dir="rtl"] .drop-menu{
            margin-left: 1em !important;
        }
    } 

</style>
    


</head>

<body id="page-top">


<div id="wrapper">
   



        <!-- Navigation -->

        
            @include('admin.theme.sidebar')
			 <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            @include('admin.theme.header')

       
            




        

            @yield('content')
</div>
</div>
      </div>

        <!-- /#page-wrapper -->




    <!-- /#wrapper -->



    <!-- jQuery -->

    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>



    <!-- Metis Menu Plugin JavaScript -->

    



    <!-- Morris Charts JavaScript -->

    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>



    <!-- Custom Theme JavaScript -->

    <script src="{!! asset('theme/js/demo/chart-area-demo.js') !!}"></script>

    <script src="{!! asset('theme/js/demo/chart-pie-demo.js') !!}"></script>
      <!--This page plugins for datatable -->
    <script src="{{ asset('app-assets/assets/css/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/css/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/js/datatable/datatable-basic.init.js') }}"></script>
    <script type="text/javascript">
  $(document).ready(function() {

    $('#dataTable').DataTable();
} );
</script>


</body>



</html>