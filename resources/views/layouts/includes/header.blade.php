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
img.im { 

max-width:215px; 

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
   
   
   
   
   
   
   
   
   
   
   
  

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown:hover .dropbtn {
  background-color: #2e3191;
}

.dropdown-content {
  display: none;
 position: fixed;
    background-color: #ffffff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: #f7941d;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
   
   
   
   
   
   
   
   
   
   
   @media screen and ( max-width: 1024px ) {

   }
   
   
   
   
   
   
   
   @if(Request::is('/')||Request::is('/home'))
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
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
	 <body>
    <main class="main mob" id="top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4 d-block nav"  id="nav" >
	
        <div class="container" >
		<a class="navbar-brand" href="{{url('/')}}">
		<img class="im"  src="{{asset ('app-assets/assets/img/gallery/white_logo-01@2x1.png')}}" style=" "   alt="..." /></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"  href="{{url('/')}}">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{url('about')}}">About us</a></li>
			  
	    
			  <li class="nav-item px-2"><a class="nav-link {{ (request()->is('book')) ? 'active' : '' }}" href="{{url('book')}}">Book Transportaion</a></li>
			  <li class="nav-item px-2"><a class="nav-link {{ (request()->is('track')) ? 'active' : '' }}" href="{{url('track')}}">Track Order</a></li>
		 
          <li class="nav-item px-2 dropdown">
		  <a class="dropbtn"><i class="fas fa-user" style="font-size: 24px;color:white"></i> 
      <i class="fa fa-caret-down"></i>
    </a>
	<div class="dropdown-content">
	
     <a href="{{url('myaccount')}}" class="btn btn-sm btn-default">My account</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
       &nbsp; <button style="color: #f7941d;" class="btn btn-sm btn-default" type="submit">
            Logout
        </button>
    </form>
    </div>
		  </li>
		 
          </ul>
          </div>
		  
        </div>
	
      </nav>
