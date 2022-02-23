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
	
text-align:left;                
            
 
}
.centerd {
	
text-align:center;                
            
 
}
.centers{
	margin: auto;
	width: 40%;
	padding: 10px;
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
.ii{
	
	width:54%;
}
@media screen and ( max-width: 1024px ) {
div.ss { 
margin-left: 0; 

}
}
  
 @media screen and ( min-width: 1025px) {
div.ss {   
 margin-left: -25%;
    margin-top: 12%;
}
}

@media screen and ( max-width: 1024px ) {
div.ii { 
width:100%;

}
}
  
 @media screen and ( min-width: 1025px) {
div.ii {   
width:54%;
}
}


</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	
<ul class="breadcrumb">
  <li><a href="{{url('/')}}">Home</a></li>
 
  <li><a href="{{url('/myaccount')}}">My Account</li></a>
  <li>Track Order</li>
</ul>


  <section class="bg-primary-gradient" id="faq" style=" margin-top: -3%;">
        <div class=" bg-holder" style="background: #F7941D 0% 0% no-repeat padding-box;
opacity: 0.05;
background-position:right; border-top-left-radius: 140px;  left: 428px;
    width: 68%;
height: 200px;">	
		</div>
		<div class="container" style="margin-top:-8%;">
		<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		 <br>
		
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		 <h4 style="text-align: left;
font: normal normal bold 30px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;">Orders</h4><br>
@foreach($order as $books)
		 <div class="row" style="">
		  

            <div class="col-md-3 ii" style="margin-top: -5%;">
			
            

<a href="#">
<div style=" background: #F7941D0D 0% 0% no-repeat padding-box;
opacity: 1;
border-radius: 2px;">
<div class="row">
<div class="center">
<img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/truckicon.png')}}" alt="..." />

<p style="text-align: center;font: normal normal bold 18px/24px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 1;">{{$books->firstname.' '.$books->lastname}}</p>
<p style="text-align: center;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #5351A8;opacity: 1;">@php 

if($books->orderstatus==1)
{
	echo "New";
}
if($books->orderstatus==2)
{
	echo "Pending";
}if($books->orderstatus==3)
{
	echo "In Progress";
}if($books->orderstatus==4)
{
	echo "Shipped";
}if($books->orderstatus==5)
{
	echo "Delivered";
}if($books->orderstatus==6)
{
	echo "Complete";
}	

 @endphp</p>
</div>
</div>
<div class="row">
<div clss="" >
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Destination&nbsp;&nbsp;&nbsp;&nbsp;{{$books->adress_dir}}</p>
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Order Number&nbsp;&nbsp;&nbsp;&nbsp;{{$books->order_num}}</p>
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Order Date&nbsp;&nbsp;&nbsp;&nbsp;{{$books->requested_delivery_date}}</p>

</div>
</div>

             
</div>	

</a>		


</div>
</div><br><br>













		
		
		
		</div>
		<div class="col-md-6">
		<h4 style="text-align: left;
font: normal normal bold 30px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;">Status</h4>
		<div class="row ss" style="   ">
			  <div class="col-md-2 col-sm-2 " style="">
			   <div class="centerd">
        <a href="#"> <img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/order1.png')}}" alt="..." />
		</div>
<div class="centerd"><p  class="pt" style="color:#2E3191;">Order Placed</p></div></a> 
			 </div>&nbsp;&nbsp;
			 <div class="col-md-2 col-sm-2 "> <div class="centerd">
			<a href="#"> <img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/8594.png')}}" alt="..." />
			</div>
			  <div class="centerd"><p class="pt" style="color:#2E3191;">Order Confirmed</p></div>
			  </a>
			 </div>&nbsp;&nbsp;
			 <div class="col-md-2  col-sm-2 "> <div class="centerd">
			<a href="#"><img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/8595.png')}}" alt="..." />
			</div>
			<div class="centerd"><p class="pt" style="color:#2E3191;">Ready to Pickup</p></div>
			  </a>
			 </div>
  
              <div class="col-md-2 col-sm-2 "> <div class="centerd">
			<a href="#"> <img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/8597.png')}}" alt="..." />
			</div>
			<div class="centerd"><p class="pt" style="color:#2E3191;">On the way</p></div>
			  </a>
			 </div>
			 
			  <div class="col-md-2  col-sm-2 "> <div class="centerd">
			<a href="#"> <img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/8598.png')}}" alt="..." />
			</div>
			<div class="centerd"><p class="pt" style="color:#2E3191;">Delivered</p></div>
			  </a>
			 </div>
  
  <div class="">
  	 <h5 style="text-align: center;
font: normal normal  30px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;">Status</h5>
  
  <p  class="pt" style="color:#2E3191;">@php

if($books->orderstatus==1)
{
	echo "New";
}
if($books->orderstatus==2)
{
	echo "Pending";
}if($books->orderstatus==3)
{
	echo "In Progress";
}if($books->orderstatus==4)
{
	echo "Shipped";
}if($books->orderstatus==5)
{
	echo "Delivered";
}if($books->orderstatus==6)
{
	echo "Complete";
}	

  @endphp</p>
  <p  class="pt" style="color:#2E3191;">It takes three more day to reach the destination approximately.</p>
  
  <div class="centerd"><a class="btn btn-primary" type="submit">Contact Driver</a></div>
            </div>
			@endforeach
			</div>
		</div>
		</div>
        <!--/.bg-holder-->
       
          
        </div>
      </section>
















@endsection