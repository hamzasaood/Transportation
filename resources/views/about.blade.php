
@extends("layouts.app")

@section("content")



<style>
.nn{
	
	margin-top: -16%;
	
}
.texting{
	
	text-align: left;
font: normal normal bold 38px/38px Rajdhani;
letter-spacing: 0px;
color: #FFFFFF;
opacity: 1;
}
.rr{
	
	margin-bottom: 503px;
}
 @media screen and ( max-width: 1024px ) {
p.texting {  
color: #FFFFFF;
font: normal normal bold 13px/16px Rajdhani;
}
}
@media screen and ( max-width: 1024px ) {
a.rr {  
margin-bottom: 257px;
    margin-right: 313px;
}
}
@media screen and ( max-width: 1024px ) {
div.ms {  
background-position:center;background-size:100% 62% ;
}
}
@media screen and ( max-width: 1025px ) {
div.ms {  
background-position:center;background-size:100% 62% ;
}
}
.ms{
	background-size: contain;
}



 
</style>
@isset($message)
		  <script>
	
	
  Swal.fire("{{$message}}", "", "{{$success}}");

</script>


@endif


      	 <br><br><br><br>
	  	 
 
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="aboutUs">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center mb-6 mb-md-0 order-0 order-md-1"><img class="w-100" src="{{asset ('app-assets/assets/img/gallery/Group8903.png')}}" alt="..." /></div>
            <div class="col-md-6 text-center text-md-start mb-6">
              <h4 class="" style="letter-spacing: 0px;color: #EE8F1C;">ABOUT US</h4>
              <p class="my-5 fs-1 pe-xl-8" style="font: normal normal normal 27px/41px Helvetica Neue LT;
letter-spacing: 0.76px;
color: #2E3191;
opacity: 1;">
The occupational traffic permit is one of the most important things in the company when carrying out freight transport. In fact, it is a prerequisite for doing business traffic at all. </p>
              <div class="card card-span bg-soft-primary border-start border-primary border-5 mt-3">
                <div class="card-body">
                  <h4 class="lh-base px-lg-5 py-3" style="font: normal normal bold 34px/49px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 1;">How do you do when you need to obtain a commercial traffic permit for freight transport
                    to your business?</h4>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
    
	  <style>
	  @media screen and ( max-width: 1024px ) {
div.imgs {  
 margin-bottom: 23px;
}
}
	  
	     
	  </style>
 <div class="imgs">
	  <img     
 src="{{asset ('app-assets/assets/img/gallery/MaskGroup5.png')}}" height="120%"/>
	  <br>
	  </div>
      

      <section class="py-4">
	 
	  
        <div class="bg-holder" style="
max-width: 100%;


background: #2E3191 0% 0% no-repeat padding-box;
border-radius: 89px;
opacity: 1;
">



		</div>
        <!--/.bg-holder-->
        <div class="container"  >
          <div class="row min-vh-lg-50 min-vh-xl-75 nn">
		
            <div class="col-lg-6 col-xl-5 my-2 py-9 d-none d-lg-block">
			  <img  src="{{asset ('app-assets/assets/img/gallery/white_logo-01@2x1.png')}}" style="background-size:contain;  
        max-width: 50%;"   alt="..." />
              <div class="card card-span bg-transparent    mt-3">
			  
                <div class="card-body">
                  
                </div>
				<div class="row">
				<div class="col-sm-4"><p style="color: #FFFFFF;">QUICK LINKS</p>
                  <ul class="list-unstyled list-inline mb-6 mb-md-0 text-center text-md-end text-xl-start">
			  
                <li class=""><a class="text-decoration-none" href="{{url('/about')}}">About Us</a></li>
                <li class=" "><a class="text-decoration-none" href="{{url('/book')}}">Book Transportation</a></li>
                <li class=""><a class="text-decoration-none" href="{{url('/track')}}">Track orders</a></li>
				

              </ul>
                </div>
				<div class="col-sm-4"><p style="color: #FFFFFF;">LEGAL</p>
                  <ul class="list-unstyled list-inline mb-6 mb-md-0 text-center text-md-end text-xl-start">
			  
               <li class=""><a class="text-decoration-none" href="{{url('/terms&conditions')}}">Terms & Conditions</a></li>
                
                <li class=""><a class="text-decoration-none" href="{{url('/privacy_policy')}}">Privacy Policy</a></li>
				
				

              </ul>
                </div>
				<div class="col-sm-4">
				<p style="color: #FFFFFF;">CAREERS</p>
                  <ul class="list-unstyled list-inline mb-6 mb-md-0 text-center text-md-end text-xl-start">
			  
                 <li class=""><a class="text-decoration-none" href="#!">Jobs</a></li>
               
              </ul>
                </div>
				</div>
              </div>
            </div>
            <div class="col-lg-7 col-xl-6 mb-3" style="margin-left: auto;">
              <div class="card card-span shadow  px-5">
                <div class="card-body">
                  <form method="POST" class="row g-3 align-items-center" action="{{url('/contact')}}">
				  @csrf
				  <label class="form-label" style="font: normal normal bold 33px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Send Inquiry</label>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput">Name</label>
					<input required name="name" class="form-control form-traffico-control" id="formGroupExampleInput" type="text" placeholder="Name" /></div>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Email address</label>
					<input required name="email" class="form-control form-traffico-control" id="formGroupExampleInput2" type="text" placeholder="Your email address" /></div>
                    <div class="mb-3"><label class="form-label" for="">Message</label>
					<textarea required name="message" class="form-control form-traffico-control" id="formGroupExampleInput3" type="text" placeholder="Your Message"></textarea></div>
					<div class="col-12 third"><button class="btn btn-primary" type="submit">Send</button></div>
                  </form>
                </div>
              </div>
			  
			  





		


            </div>
			<div class="row">
			<div class="col-md-6">
			<p class="text-center text-md-end text-xl-start" style=" 
letter-spacing: 0px;
color: #FFFFFF;
opacity: 1;
">Follow us at</p>
		  <ul style="" class="list-unstyled list-inline mb-6 mb-md-0 text-center text-md-end text-xl-start">
			  
                <li class="list-inline-item mr-2"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{asset ('app-assets/assets/img/icons/i.png')}}" alt="..." /></a></li>
                <li class="list-inline-item mr-2"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{asset ('app-assets/assets/img/icons/t.png')}}" alt="..." /></a></li>
                <li class="list-inline-item mr-2"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{asset ('app-assets/assets/img/icons/f.png')}}" alt="..." /></a></li>
              </ul>
	</div>
	
	
	
			<div class="col-md-6 col-lg-7 col-xl-6 mb-3" style="">
			 <p class="text-center text-md-end " style=";
letter-spacing: 0px;
color: #FFFFFF;
opacity: 1;"><svg xmlns="http://www.w3.org/2000/svg" width="40.752" height="40.754" viewBox="0 0 53.752 53.754">
  <g id="Group_8746" data-name="Group 8746" transform="translate(95.996 0.002)">
    <g id="lanuage_icon" data-name="lanuage icon" transform="translate(-95.996 -0.002)">
      <path id="Subtraction_5" data-name="Subtraction 5" d="M21726.5,17253.752a26.791,26.791,0,1,1,10.455-2.113A26.666,26.666,0,0,1,21726.5,17253.752Zm0-39.619a12.759,12.759,0,1,0,12.76,12.758A12.772,12.772,0,0,0,21726.5,17214.133Zm.426,24.645v-5.1a30.672,30.672,0,0,0,4.7-.432l1.055-.186c-1.242,3.357-3.393,5.494-5.754,5.717Zm-.852,0h0c-2.361-.23-4.512-2.365-5.752-5.717l1.049.184a30.638,30.638,0,0,0,4.705.434v5.1Zm4.17-.588h0a11.766,11.766,0,0,0,3.381-5.293l3.479-.6A11.864,11.864,0,0,1,21730.244,17238.189Zm-7.492,0a11.862,11.862,0,0,1-6.854-5.893l3.479.6a11.722,11.722,0,0,0,3.375,5.293Zm4.174-5.369v-5.5h6.8a18.149,18.149,0,0,1-.736,4.832l-1.5.258a29.015,29.015,0,0,1-4.557.414Zm-.852,0h0a29.058,29.058,0,0,1-4.557-.414l-1.5-.258a18.1,18.1,0,0,1-.738-4.832h6.8v5.5Zm7.83-.83,0,0a19.05,19.05,0,0,0,.664-4.672h3.826a11.871,11.871,0,0,1-.861,4.047l-3.629.627Zm-14.812,0h0l-3.623-.627a11.631,11.631,0,0,1-.861-4.047h3.82a19.09,19.09,0,0,0,.664,4.672Zm19.3-5.525h-3.826a18.942,18.942,0,0,0-.666-4.668l3.631.629a11.788,11.788,0,0,1,.861,4.037Zm-4.674,0h-6.8v-5.5a30.01,30.01,0,0,1,4.559.414l1.5.262a18.1,18.1,0,0,1,.736,4.824Zm-7.648,0h-6.8a18.075,18.075,0,0,1,.738-4.826l1.5-.262a30.147,30.147,0,0,1,4.559-.414v5.5Zm-7.648,0h-3.82a11.6,11.6,0,0,1,.861-4.039l3.625-.629a19.087,19.087,0,0,0-.666,4.666Zm18.678-4.979h0l-3.477-.6a11.741,11.741,0,0,0-3.385-5.3,11.893,11.893,0,0,1,6.861,5.895Zm-21.205,0,0,0a11.9,11.9,0,0,1,6.855-5.895,11.741,11.741,0,0,0-3.379,5.3l-3.477.6Zm16.783-.764h0l-1.053-.18a30.441,30.441,0,0,0-4.7-.432v-5.1c2.365.229,4.516,2.361,5.754,5.709Zm-12.361,0,0,0c1.24-3.352,3.391-5.486,5.752-5.715v5.105a30.671,30.671,0,0,0-4.705.432l-1.047.18Z" transform="translate(-21699.625 -17199.998)" fill="#f7941d"/>
    </g>
  </g>
</svg>&nbsp;&nbsp;العربية</p>


 <p class="text-center text-md-end " style="
letter-spacing: 0px;
color: #FFFFFF;
opacity: 1;">&copy; The International Transport Company, 2021</p> 
</div>

			
	</div>
          </div>
		  
		 
		  
		  
        </div>
      </section>
	  <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
	


@endsection