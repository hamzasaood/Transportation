@extends("layouts.app")
<br><br><br><br>
@section("content")

<style>

.in{
background: #FFFFFFE0 0% 0% no-repeat padding-box;box-shadow: 2px 2px 10px #F7941D1C;border: 1px solid #F7941D;opacity: 1;
width:14%;

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
</style>
<style>
* {
	margin: 0;
	padding: 0
}

html {
	height: 100%
}

h2{
	color: #2F8D46;
}
#form {
	text-align: left;
	position: relative;
	margin-top: 20px
}

#form fieldset {
	background: white;
	border: 0 none;
	border-radius: 0.5rem;
	box-sizing: border-box;
	width: 100%;
	margin: 0;
	padding-bottom: 20px;
	position: relative
}

.finish {
	text-align: center
}

#form fieldset:not(:first-of-type) {
	display: none
}

#form .previous-step, .next-step {
	
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 0px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px 10px 0px;
	float: right;
	border-radius: 50%;
}

.form, .previous-step {
	background: white;
}

.form, .next-step {
	background: white;
}

#form .previous-step:hover,
#form .previous-step:focus {
	box-shadow:0 0 5px 10px rgb(218 218 218/40%);
}

#form .next-step:hover,
#form .next-step:focus {
	box-shadow:0 0 5px 10px rgb(218 218 218/40%);
	
}

.text {
	color: #2F8D46;
	font-weight: normal
}

#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	color: lightgrey
}

#progressbar .active {
	color: #2F8D46
}

#progressbar li {
	list-style-type: none;
	font-size: 15px;
	width: 25%;
	float: left;
	position: relative;
	font-weight: 400
}

#progressbar #step1:before {
	content: "1"
}

#progressbar #step2:before {
	content: "2"
}


#progressbar li:before {
	width: 50px;
	height: 50px;
	line-height: 45px;
	display: block;
	font-size: 20px;
	color: #ffffff;
	background: lightgray;
	border-radius: 50%;
	margin: 0 auto 10px auto;
	padding: 2px
}

#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: lightgray;
	position: absolute;
	left: 0;
	top: 25px;
	z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
	background: #2F8D46
}

.progress {
	height: 20px
}

.progress-bar {
	background-color: #f7941d
}



.insm{
border: 1px solid rgba(238,77,71,0.5);
    border-radius: -0.687rem;
    color: #000;
    font-weight: 300;
    background-color: #FFFEFE;
    padding: 0rem 1rem;

}





</style>


<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	
<ul class="breadcrumb">
  <li><a href="{{url('/')}}">Home</a></li>
 
  <li>Book Transportation</li>
</ul>


 






	<link href=
'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

	<script src=
'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
	</script>

	<script src=
'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
	</script>

	



	<div class="container">
		<div class=" justify-content-center">
			
				
				<div class="card card-span shadow py-4 px-5"  >
                <div class="card-body" style="width: auto;">
					<form id="form" method="POST" class="row align-items-center "action="{{route('book.form')}} " enctype="multipart/form-data">
										  
										

						<div class="progress">
							<div class="progress-bar"></div>
						</div> <br><br>
						<fieldset id="my">
						<div class="row">
						<div class="col-md-6">
 <label class="form-label" style="font: normal normal bold 25px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Invoice Documents</label>
@csrf
				<div class="mb-3"><label class="form-label" for="formGroupExampleInput">Invoice Number</label>
				<input required name="invoice_num" size="" class=" form-control form-traffico-control" id="in formGroupExampleInput"   type="text" placeholder="Number" /></div>
  <label class="form-label" style="font: normal normal bold 25px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Address</label>

					<div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Pickup location</label>
					<input required name="pickuplocation" class="form-control form-traffico-control" id="pickup formGroupExampleInput2"  type="text" placeholder="Pickup Location" /></div>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput3">Drop location</label>
					
					<input required name="droplocation" class="form-control form-traffico-control" id="drop" type="text" placeholder="Drop location" pattern=""/>
					
					</div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput3">Address location</label>
					
					<input required name="adress_dir" class="form-control form-traffico-control" id="" type="text" placeholder="Address location" pattern=""/>
					
					</div>
	<label class="form-label" style="font: normal normal bold 25px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Order Specifications</label>

     <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Quantity</label>
	 <input required name="quantity" class="form-control form-traffico-control" id=" formGroupExampleInput2"   type="text" placeholder="Quantity" /></div>
     <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">Weight</label>
	 <input required name="weight" class="form-control form-traffico-control" id=" formGroupExampleInput2" type="text"   placeholder="Weight" /></div>

					</div>
					<div class="col-md-6">
		<label class="form-label" style="font: normal normal bold 25px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Truck Registration</label><br>
<label class="form-label" for="formGroupExampleInput2">Upload Truck Registration Document</label>
			
			<style>
		#inputUpload {
    display: none;
}

.custom-file-upload {
    cursor: pointer;
    font-size: inherit;
    color: #f7941d;
}

.custom-file-upload:hover {
    text-decoration: underline;
}

			</style>
			<div style="border: 1px dashed #F7941D66;
border-radius: 2px;
opacity: 1;width: 263px;
    height: 133px;" class="file-upload-wrapper">
  
 
  <br>
  <div class="center" style="text-align:center;">
 <input name="attatchment" id="inputUpload" type="file"  > <i class="fas fa-file-upload" style="font-size:35px;color:#F7941D;"></i>
    <br><br>
	<p>Drag file to upload or <label for="inputUpload" class="custom-file-upload">browse</label></p>

	

 
  </div>
  
</div>
</div>
	</div>				
    
					
							<a style="" name="" 
								class="next-step" href="#"><img src="{{asset ('app-assets/assets/img/left.png')}}"/></a>
								
						</fieldset>
						<fieldset>
							
							<div class="mainf">
							 <div class="row">
							 <div class="col-md-6">
	<label class="" style="text-align: left;font: normal normal bold 25px/31px Helvetica Neue LT;

color: #F7941D;
opacity: 1;" >Book Appointment</label>


							 </div>
							 <div class="col-md-6">
							 </div>
							 
							 
							 </div>
							 <br><br>
							 <div class="row">
							 <div class="col-md-6">
							 <label class="" style="
text-align: left;
font: normal normal bold 25px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;" >Schedule Date</label><br>
							 <input   class=" input form-control form-traffico-control" type="date" id="txt d8 start" name="requested_delivery_date"/>
							 </div>
							 <div class="col-md-6">
							  
							 </div>
							</div>
							<br><br>
							 <div class="row">
							 <div class="col-md-12">
							 				  <label class="" style="
text-align: left;
font: normal normal bold 25px/31px Helvetica Neue LT;
letter-spacing: 0px;
color: #F7941D;
opacity: 1;" >Choose Truck</label>
<style>
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}

.c{
display: flex;
  justify-content: center;
  align-items: center;
}
</style>
<div class="row justify-content-center">
<div class="col-md-4 c" style="border: 1px dashed #F7941D66;
border-radius: 2px;
opacity: 1; width: fit-content; height: 155px;">
<label >
<input   id="small truck_type " class=" input form-control form-traffico-control" type="radio"  name="truck_type" value="Normal" >
 <img src="{{asset ('app-assets/assets/img/gallery/truck.png')}}"/> 
		</label>
	
							 </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <div class="col-md-4 c" style="border: 1px dashed #F7941D66;
border-radius: 2px;
opacity: 1; width: fit-content; height: 155px;">
<label >
<input    id=" medium truck_type" class="input form-control form-traffico-control" type="radio"  name="truck_type" value="Ice Cream" >
  <img src="{{asset ('app-assets/assets/img/gallery/truck.png')}}"/>
  
		</label>					 
							 </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="col-md-4 c" style="border: 1px dashed #F7941D66;

opacity: 1; width: fit-content; height: 155px;">
<label >
<input   id=" large truck_type" class=" input form-control form-traffico-control" type="radio"  name="truck_type" value="Cold">
  <img src="{{asset ('app-assets/assets/img/gallery/truck.png')}}"/>
</label>  
							 
							 </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 
</div>
							 
							</div>
							</div>
							</div>
							
							
							<button id="btSubmit"   type="submit" onclick="myFunction()" class=" button next-step">
							<img src="{{asset ('app-assets/assets/img/left.png')}}"/>
							</button>
							<a  name=""
								class="previous-step" href="#"><img src="{{asset ('app-assets/assets/img/right.png')}}"/></a>
							
							
						</fieldset>
				
						
					</form>
				</div>
			</div>
			</div>
			<br><br>
		</div>
	


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>





<script>
$().ready(function(){
 

});


$(document).ready(function () {
	var currentGfgStep, nextGfgStep, previousGfgStep;
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;
	

	

   
	setProgressBar(current);
	 

	$(".next-step").click(function () {

   	var form=$("#form");
	form.validate({
  // in 'rules' user have to specify all the constraints for respective fields
 rules: {
      invoice_num: {
        required: true
       
      },
      pickuplocation: {
        required: true
       
      },
      droplocation: {
        required: true
       
      },
      adress_dir: {
        required: true
        
      },
	   quantity: {
        required: true
       
      },
	   weight: {
        required: true
       
      },
	   requested_delivery_date: {
        required: true,
       
      },
	  truck_type: {
        required: true,
       
      }
	   
	  
    },
	errorElement: "span",
    errorClass: "help-inline"
});
	if (form.valid()==true)
	{


		currentGfgStep = $(this).parent();
		nextGfgStep = $(this).parent().next();

		$("#progressbar li").eq($("fieldset")
			.index(nextGfgStep)).addClass("active");
			
		nextGfgStep.show();
		currentGfgStep.animate({ opacity: 0 }, {
			
			step: function (now) {
				opacity = 1 - now;

				currentGfgStep.css({
					'display': 'none',
					'position': 'relative'
				});
				nextGfgStep.css({ 'opacity': opacity });
				
			},
			duration: 500
		});
		setProgressBar(++current);
		
	}		
	});

	$(".previous-step").click(function () {

		currentGfgStep = $(this).parent();
		previousGfgStep = $(this).parent().prev();

		$("#progressbar li").eq($("fieldset")
			.index(currentGfgStep)).removeClass("active");

		previousGfgStep.show();

		currentGfgStep.animate({ opacity: 0 }, {
			step: function (now) {
				opacity = 1 - now;

				currentGfgStep.css({
					'display': 'none',
					'position': 'relative'
				});
				previousGfgStep.css({ 'opacity': opacity });
			},
			duration: 500
		});
		setProgressBar(--current);
	});

	function setProgressBar(currentStep) {
		var percent = parseFloat(100 / steps) * current;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
			
			
			
	}
	

	
});


function myFunction() {
	
        var bt = document.getElementById('btSubmit');
		var txt =document.getElementById('txt');
        if (txt.value != '') {
            bt.disabled = false;
			 document.getElementById("form").submit();
        }
        else {
            bt.disabled = true;
        }
    

		
	

		
	
	


}




</script>


@php
/*
var x = document.getElementById("form").validate({
    rules: {
      invoice_num: {
        required: true,
       
      },
      pickuplocation: {
        required: true,
       
      },
      droplocation: {
        required: true,
       
      },
      adress_dir: {
        required: true,
        
      },
	   quantity: {
        required: true,
       
      },
	   weight: {
        required: true,
       
      },
	   requested_delivery_date: {
        required: true,
       
      },
	   truck_type: {
        required: true,
       
      }
    },
    errorElement: "span",
    errorClass: "help-inline",
  }); */
  @endphp

 
	
@endsection
