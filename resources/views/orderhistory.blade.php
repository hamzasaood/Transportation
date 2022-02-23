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

letter-spacing: 0px;
color: #2E3191;
opacity: 0.37;
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
margin-left: -8%; 

}
}
  
 @media screen and ( min-width: 1025px) {
div.ss {   
 margin-left: -4%;
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
  
  <li>Track</li>
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
		 <h4 style="text-align: left;
font: normal normal bold 30px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;">Orders</h4>
		</div>
		<div class="col-md-4 offset-md-2">
		
		<h4 style="text-align: left;
font: normal normal bold 30px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;">Order Details</h4>
		</div>
		</div>
		<br>
		<div class="row">
		<div class="col-md-6">
		 <br>

		@foreach($order as $books)
		 <div class="row" style="">
		  

            <div class="col-md-3 ii" style="margin-top: -5%; ">
			
            

<a href="{{route('orderh.view',['bookid' => $books->bookid])}}">
<div style=" background: #F7941D0D 0% 0% no-repeat padding-box;
opacity: 1;
border-radius: 2px;
">
<div class="row">
<div class="center">
<img class="text-align:center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/truckicon.png')}}" alt="..." />

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
<div class="" >
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Destination&nbsp;&nbsp;&nbsp;&nbsp;{{$books->adress_dir}}</p>
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Order Number&nbsp;&nbsp;&nbsp;&nbsp;{{$books->order_num}}</p>
<p style="text-align: left;font: normal normal normal 14px/19px Helvetica Neue LT;letter-spacing: 0px;color: #2E3191;opacity: 0.4;">Order Date&nbsp;&nbsp;&nbsp;&nbsp;{{$books->requested_delivery_date}}</p>

</div>
</div>

             
</div>	

</a>		


</div>
</div><br><br>
@endforeach




		
		
		
		</div>
		<div class="col-md-6 text-center">
		
<br>

<input type="search" id="form1" class="form-control" placeholder="Search by Order Number" />
<br>
   
  <button  style="margin-left: 42%;"type="submit" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
  <br><br><br>
  
		<div class="row ss" style="   ">
		
			  <div class="col-md-12 col-sm-12 " style="">
			   <div class="centerd">
        <img align="center" class="list-social-icon" src="{{asset ('app-assets/assets/img/Track/oh.png')}}" alt="..." /><br><br><br>
		</div>
 <p  class="pt" style="color: #2E3191;
    font: unset;
    font-size: medium;
    text-align: center;
    font-family: sans-serif;
    font-weight: bold;
	">Select the order or write order number to view order history</p>
			 </div>
			 
  
  
			</div>
		</div>
		</div>
        <!--/.bg-holder-->
       
          
        </div>
      </section>
















@endsection