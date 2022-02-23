@extends("layouts.app")
<br><br><br><br>
@section("content")

<style>

.in{
background: #FFFFFFE0 0% 0% no-repeat padding-box;box-shadow: 2px 2px 10px #F7941D1C;border: 1px solid #F7941D;opacity: 1;


}
ul.breadcrumb {
  padding: 26px 16px;
  list-style: none;
  background-color:#fffefe;
}
ul.breadcrumb li {
  display: inline;
  font-size: 14px;
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: blue;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #F7941D;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #2E3191;
  text-decoration: underline;
}
.center {
	
text-align:center;                
            
 
}
.centers{
	display: flex;
  align-items: center;
  justify-content: center;
  height:100px;
}
.pt{
	text-align: center;
font: normal normal medium 14px/5px Helvetica Neue LT;
letter-spacing: 0px;
color: #2E3191;
opacity: 1;
}
 @media screen and ( max-width: 1024px ) {
div.in {width:33.3%;  

}
   }
   @media screen and ( min-width: 1025px) {
div.in {   
width:19%;
}
}




</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	
<ul class="breadcrumb">
  <li><a href="{{url('/')}}">Home</a></li>
 
  <li>My Account</li>
</ul>


 <section class="bg-primary-gradient" id="faq" style="margin-top: -3%;">
        
	
<div class=" bg-holder" style="background: #F7941D 0% 0% no-repeat padding-box;
opacity: 0.05;
background-position:right; border-top-left-radius: 140px;  left: 115px;
    width: 91%;
height: 200px;"></div>	
		 
		
		@isset($message)
		  <script>
	
	
  Swal.fire("{{$message}}", "", "{{$success}}");

</script>


@endif
		
        <!--/.bg-holder-->
        <div class="container" style="margin-top:-8%; margin-left: 15%;">
		
		
		<div class="row">
		<div class="col-md-9 col-sm-9" style="">
		<h3 style="color:#F7941D">My Account</h3><br><br>
		<h4 style="color:#F7941D">Edit profile</h4>
		</div>
		<div class="col-md-3" style="">
		 <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button  class="btn btn-primary" type="submit">
           <i class="fas fa-sign-out-alt" style="font-size:26px;color:#fffefe;"></i>
        </button>
    </form>
		
		
		</div>
		</div>
		<div class="row ">
			  <div class="col-md-4 in col-sm-4 offset-md-1 " style="">
			   <div class="centers">
        <a href="{{url('/myaccount/editaccount')}}"> <i class='fa fa-edit' style='font-size:26px;color:#F7941D; 
'></i></div>
<div class="center"><p  class="pt" style="color:#F7941D;">Edit Account</p></div></a> 
			 </div>
			 <div class="col-md-4 in col-sm-4 offset-md-1 " style=""> <div class="centers">
			<a href="{{url('/myaccount/editaccount')}}"> <i class='fas fa-user-lock' style='font-size:26px;color:#F7941D; '></i>
			</div>
			  <div class="center"><p class="pt" style="color:#F7941D;">Edit Password</p></div>
			  </a>
			 </div>
			 
  
            </div>
		
		<br>
		<div class="row">
		<h4 style="color:#F7941D">Order Records</h4>
			  <div class="col-md-4 in offset-md-1" style="">
			  <div class="centers">
<a href="{{url('/track')}}"><i class='fas fa-history' style=' font-size:26px;color:#F7941D; '></i>
</div>
       <div class="center"><p class="pt" style="color:#F7941D;">View Orders</p></div>
		
		</a>

			 
			 </div>
			 
			
  
            </div>
		
          
        
        </div>
      </section>















@endsection