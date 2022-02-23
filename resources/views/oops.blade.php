@extends("layouts.app")

@section("content")


 <style>
   

.containers{
top: 0px;
left: 0px;
width: 100%;
height: 100%;
	
	
	background: #2E3191 0% 0% no-repeat padding-box;
box-shadow: 0px 3px 6px #2E3191;
border-radius: 9px;
opacity: 1;
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
	
	
}
.imh{
	top: 259px;
left: 273px;
width: 322px;
height: 322px;
background: #F7941D 0% 0% no-repeat padding-box;
opacity: 0.73;
	
	
}
   .i{
	   
	  background: white 0% 0% no-repeat padding-box;
opacity: 0.73;
	   
   }
   
   
 </style>



<br><br>
 <section class="container-fluid"   id="" style="background-color: #5E707B;">
 <div class="row" >
 <div class="col-md-6" >
 </div>
 
 </div>
 <div class="row" >
 
 <div class="col-md-6 ">
 
 <img style="margin-left: 22%;" class="" src="{{asset ('app-assets/assets/img/gallery/Group8902.png')}}" width="60%" alt="..." />
 
 </div>
  
 
 <div class="col-md-6 " style="margin-top: 10%;">
 
 <p style="text-align: left;
font: normal normal medium 20px/29px Helvetica Neue LT Std;
letter-spacing: 0.06px;
color: #FFFFFF;
opacity: 1;
"> 
Please Signup to proceed</p>

<a class="btn btn-primary" href="{{route('register')}}" type="submit">Signup</a>
<br><br>
 <p style="font: normal normal medium 20px/29px Helvetica Neue LT Std;
letter-spacing: 0.06px;
color: #FFFFFF;
opacity: 1;"> Already have an Account?&nbsp;<a style="color: #F7914D;" href="{{route('login')}}"> Login</a></p>
 </div>
 </div>

      </section>
	
  


@endsection

  