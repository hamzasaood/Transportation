@extends("layouts.app")
<br><br><br><br><br><br>
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
	float: right
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

#progressbar #step3:before {
	content: "3"
}

#progressbar #step4:before {
	content: "4"
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
		<div class="row justify-content-center">
			
				
				<div class="card card-span shadow py-4 px-5" >
                <div class="card-body">
					<form id="form" method="POST" class="row align-items-center" enctype="multipart/form-data">
										@csrf  
										

						<div class="progress">
							<div class="progress-bar"></div>
						</div> <br><br>

						
						<fieldset>
						
						<div class="row">
							
						
	                          <div class="center">
	                         <img  src="{{asset ('app-assets/assets/img/cong.png')}}"/>

</div><br><br>

                                
   
							
							 
							 
							 </div>
							
							 <div class="center">
							 <label  class="form-label" for="formGroupExampleInput3">Congratulations</label><br>
   <label class="form-label" for="formGroupExampleInput3">Your order is confirmed. Please check your email. Thank you!</label><br>
   <a href="{{url('/track')}}"><input type="button" value="Track" class="btn btn-primary"></input></a>
							 
							 
						</div>
						
						
						
						</fieldset>
						
					</form>
				</div>
			</div>
			</div>
			<br><br>
		</div>
	






<script>



$(document).ready(function () {
	var currentGfgStep, nextGfgStep, previousGfgStep;
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;
   
	setProgressBar(current);

	$(".next-step").click(function () {

   


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





</script>



 
	
@endsection
