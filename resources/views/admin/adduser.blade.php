@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Add User')}}</h1>
                   

                    <!-- DataTales Example -->
                   <div class="col-lg-7 col-xl-6 mb-3" style="margin-left:auto;margin-right:auto;">
              <div class="card card-span shadow  px-5 py-4">
                <div class="card-body">
						
			 <form class="row g-3 align-items-center" enctype="multipart/form-data" method="POST" action="{{ route('user.store') }}">
		 
				@csrf
			
				
				 <div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.ProfileImage')}}</label>
					<input required name="image" type="file" id="input-file-now" class="file-upload form-control" />
					
					</div>
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.FirstName')}}</label>
<input required name="firstname"  class="form-control form-traffico-control" id="formGroupExampleInput" type="text" placeholder="{{__('translation.FirstName')}}" />
					</div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.LastName')}}</label>
<input required name="lastname"  class="form-control form-traffico-control" id="formGroupExampleInput" type="text" placeholder="{{__('translation.LastName')}}" />
		           </div>
				   	<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Email')}}</label>
<input required name="email"  class="form-control form-traffico-control" id="formGroupExampleInput" type="email" placeholder="{{__('translation.Email')}}" />
		           </div>
				   		<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Password')}}</label>
<input required name="password"  class="form-control form-traffico-control" id="formGroupExampleInput" type="password" placeholder="{{__('translation.Password')}}" />
		           </div>
				   		<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.DOB')}}</label>
<input required name="dob"  class="form-control form-traffico-control" id="formGroupExampleInput" type="date" placeholder="{{__('translation.DOB')}}" />
		           </div>
				   	<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Contact Number')}}</label>
<input required name="no"  class="form-control form-traffico-control" id="formGroupExampleInput" type="text" placeholder="{{__('translation.Contact Number')}}" />
		           </div>
				   	
				   	
					<div class="mb-3">
					<label class="form-label" for="formGroupExampleInput">{{__('translation.Usertype')}}</label>
					<select required class=" form-control form-traffico-control" id="formGroupExampleInput" name="{{__('translation.Usertype')}}">
					 
					 <option value="admin">{{__('translation.Admin')}}</option>
					<option value="driver">{{__('translation.Driver')}}</option>
					<option value="customer">{{__('translation.Customer')}}</option>
					
					
					</select>
					</div>
						 <div class="mb-3">
						 
						 <label class="form-label" for="formGroupExampleInput">{{__('translation.Truck Document')}}</label>
					<input  name="t_doc" type="file" id="input-file-now" class="file-upload form-control" />
					
					</div>
					
					
						 <div class="mb-3">
						 
						 <label class="form-label" for="formGroupExampleInput">{{__('translation.Civil Document')}}</label>
					<input  name="civil_doc" type="file" id="input-file-now" class="file-upload form-control" />
					
					</div>
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Truck Number')}}</label>
<input  name="truck_number"  class="form-control form-traffico-control" id="formGroupExampleInput" type="text" placeholder="{{__('translation.Truck Number')}}" />
		           </div>
					
					
					
					<div class="col-12 third text-center"><button class="btn btn-primary" type="submit">{{__('translation.Save')}}</button></div>
     
					
                  </form>
				   </div>	 
                          
                        </div>
                    </div>

                </div>



@endsection