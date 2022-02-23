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
	float: right
}

.form, .previous-step {
	background: #F7941D;
}

.form, .next-step {
	background: #F7941D;
}

#form .previous-step:hover,
#form .previous-step:focus {
	background-color: #000000
}

#form .next-step:hover,
#form .next-step:focus {
	background-color: #2F8D46
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
 <li><a href="{{url('/myaccount')}}">My Account</a></li>
  <li>Edit Account</li>
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
			<div class="col-11 col-sm-9 col-md-7
				col-lg-6 col-xl-5 p-0 mt-3 mb-2">
				
				<div class="card card-span shadow  px-5" style="width: 133%;">
                <div class="card-body">
					 <form method="POST" class="row g-3 align-items-center" action="{{route('account.update')}}">
				  @csrf
				  @foreach($users as $user)
				 
				  <label class="form-label" style="font: normal normal bold 33px/31px Helvetica Neue LT;letter-spacing: 0px;color: rgba(247, 148, 29, 1);" >Edit Account</label>
                    <div class="mb-3"><label style="margin-bottom: 0.5rem;"class="form-label" for="formGroupExampleInput">First Name</label>
					<input name="fname" required class="form-control form-traffico-control" id="formGroupExampleInput" type="text" value="{{$user->firstname;}}" /></div>
					<div class="mb-3"><label style="margin-bottom: 0.5rem;" class="form-label" for="formGroupExampleInput">Last Name</label>
					<input name="lname" required class="form-control form-traffico-control" id="formGroupExampleInput" type="text" value="{{$user->lastname;}}" /></div>
					
					<div class="mb-3"><label style="margin-bottom: 0.5rem;" class="form-label" for="formGroupExampleInput">Date Of Birth</label>
					<input name="dob" required class="form-control form-traffico-control" id="formGroupExampleInput" type="date" value="{{$user->dob;}}" /></div>
					
					<div class="mb-3"><label style="margin-bottom: 0.5rem;" class="form-label" for="formGroupExampleInput">Phone Number(min 8 numbers)</label>
					<input name="phone_number" required class="form-control form-traffico-control" id="formGroupExampleInput" type="text" value="{{$user->phone_number;}}" /></div>
					
					
					
                    
                    <div class="mb-3"><label style="margin-bottom: 0.5rem;" class="form-label" for="">Password(min 8)</label>
					<input name="password" required class="form-control form-traffico-control" id="formGroupExampleInput2" type="password"  /></div>
					 <div class="mb-3"><label style="margin-bottom: 0.5rem;" class="form-label" for="">Confirm Password</label>
					<input name="cpassword" required class="form-control form-traffico-control" id="formGroupExampleInput2" type="password"  /></div>
					<div class="col-12"><button class="btn btn-primary" type="submit">Update</button></div>
                  
				  @endforeach
				  </form>
				</div>
			</div>
			</div>
		</div>
	</div>








 
	
@endsection
