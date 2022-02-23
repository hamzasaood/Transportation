<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  
<!-- Mirrored from technext.github.io/traffico/v1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Oct 2021 08:35:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>The National Transport Company|</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset ('app-assets /assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset ('app-assets/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('app-assets/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset ('app-assets/assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset ('app-assets /assets/img/favicons/manifest.json')}}">
	
    <meta name="msapplication-TileImage" content="{{asset ('app-assets /assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset ('app-assets/assets/css/theme.min.css')}}" rel="stylesheet" />
	<style>
   .ro{
	margin-top: -9%;
    margin-left: 5%;
   }
   @media screen and ( max-width: 1024px ) {
img.im { max-width:174px; 

}
nav.nav {
	background: rgb(247 170 72)!important;
}

   }
   @media screen and ( min-width: 1025px) {
img.im { background-size:contain;  
     max-width:35%;  

}
}
img.im { height: auto; 
}

 @media screen and ( max-width: 1024px ) {
main.mob { width: fit-content;

}
   }
   
   @media (min-width:961px)  { 

main.mob { width: fit-content;
   }
  

@media (min-width:1025px) { 

main.mob { width: auto;

}


@media (min-width:641px)  {
	main.mob { width: auto;
}}



@media (min-width:320px)  { 

main.mob { width: auto;
}
 }
@media (min-width:481px)  { main.mob { width: auto;
} }


@media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */ }
@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
@media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ }
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */ }
@media (min-width:1281px) { /* hi-res laptops and desktops */ }
   
   @if(Request::is('/'))
   #nav{
	  height: 121px;
	  transition: 4s;
	 
	  
   }
   @else
	    #nav{
	  height: 121px;
	  transition: 4s;
	  background: rgb(247 148 29);
	  
   }
   @endif
 </style>
  </head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main mob" id="top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top  py-4  d-block nav " id="nav"  style=" 
     " >
	
        <div class="container" >
		<a class="navbar-brand  " href="{{url('/')}}">
		<img class="im"  src="{{asset ('app-assets/assets/img/gallery/white_logo-01@2x1.png')}}" style=" "   alt="..." /></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"  href="{{url('/')}}">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{url('about')}}">About us</a></li>
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('oops')) ? 'active' : '' }} " href="{{url('oops')}}">Book Transportaion</a></li>
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('oops')) ? 'active' : '' }} " href="{{url('oops')}}">Track Order</a></li>
            </ul>
            <a href="{{url('login')}}"><i class="fas fa-user" style="font-size: 24px;color:white"></i></a>
          </div>
		  
        </div>
	
      </nav>
