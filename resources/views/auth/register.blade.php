
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
  </head>
 <style>
   .ro{
	margin-top: -9%;
    margin-left: 5%;
   }
   @media screen and ( max-width: 1024px ) {
img.im { width: 200px; 

margin-top: -11%;
    margin-left: 11%;

}
}
@media screen and ( min-width: 1025px) {
img.im { width: 300px;


}
}
img.im { height: auto; }
   
   
   
 </style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>




 
 
 
 
	  
	 <section class="bg-primary-gradient" >
	 <div class="row ro" style="width: fit-content;">
             <div class="col-md-4">
              
            
 <a class="" href="{{url('/')}}">
		<img  class="im "  src="{{asset ('app-assets/assets/img/gallery/logo1-02.png')}}" style="background-size:contain;  
        "   alt="..." /></a><br>
		</div>
		
		 
		
	</div><br>
	 <div class="row">
		   		  		<div class="col-md-4 offset-md-2">
						<p style="text-align: center; 
font: normal normal bold 30px/42px Rajdhani;
letter-spacing: 0px;
color: #2E3191;
opacity: 1;

">Welcome To the new way of your Transportation </p>
<br>
</div>
</div>
        <div class="bg-holder" style="
		background: #F7941D 0% 0% no-repeat padding-box;
opacity: 0.05; border-top-left-radius: 140px;      
    width: 50%;
height: auto;background-position:right;background-size:contain; left: 671px;"></div>
        <!--/.bg-holder-->
        <div class="container">
		
          <div class="row flex-center">
		   		  		<div class="col-md-4">
						
</div>
               <div class="bg-holder offset-md-1" style="
			   background-image:url({{asset ('app-assets/assets/img/obj.png')}}); background-position:left;background-size: 100% 100%
			   ; float: right; margin: 0px 0px 0px -573px; top: -84px;
			   "></div>
            <div class="col-md-4">
		
	
		
		
		</div>
	
            
            <div class="col-md-4">			
			<div class="card card-span shadow " style="top: -126px;">
                <div class="card-body">
                  <form class="row align-items-center" method="POST" action="{{ route('register') }}">
				   @csrf
				  <label class="form-label" style="font: normal normal bold 33px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Create Account</label>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput">First Name</label>
					<input required class="form-control form-traffico-control" id="formGroupExampleInput" type="text" name="firstname" placeholder="Name" /></div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">Last Name</label>
					<input required class="form-control form-traffico-control" id="formGroupExampleInput" type="text" name="lastname" placeholder="Name" /></div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">Date Of Birth</label>
					<input required class="form-control form-traffico-control" id="formGroupExampleInput" type="date" name="dob" placeholder="Name" /></div>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput3">Contact Number</label>
					
					<input required class="form-control form-traffico-control" id="" name="phone_number" type="text" placeholder="Number" />
					
					</div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Email</label>
					<input required class="form-control form-traffico-control" id="formGroupExampleInput2" name="email" type="email" placeholder="Your email address" /></div>
                    
     <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Password</label>
	 <input required class="form-control form-traffico-control" id="formGroupExampleInput2" name="password" type="password" placeholder="Password" /></div>

					
					
					<div class="col-12"><button class="btn btn-primary" type="submit">Sign Up</button></div>
					<br><br><br>
					
					
					<p style="text-align:left; font: normal normal medium 15px/18px Lato;
letter-spacing: 0px;
opacity: 1;">By signing up you agree with the terms and conditions, cookies and privacy policy </p>
					<p style="text-align:center">OR</p>
					<p style="text-align:center;">Already have an Account?<a href="{{ route('login') }}">Login</a></p>
                  </form>
                </div>
              </div>
			  </div>
          </div>
          <div class="row flex-center py-4">
            <div class="col-md-6">

              <div class="accordion" id="accordionExample1">
           

              </div>
            </div>
            <div class="col-md-6">
              <div class="accordion" id="accordionExample2">
                
              </div>
            </div>
          </div>
        </div>
      </section>
	 <script src="{{asset ('app-assets/vendors/%40popperjs/popper.min.js')}}"></script>
    <script src="{{asset ('app-assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset ('app-assets/vendors/is/is.min.js')}}"></script>
    <script src="../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="{{asset ('app-assets/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset ('app-assets/assets/js/theme.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  