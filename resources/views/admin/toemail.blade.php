@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Enter Email to Send attatchment')}}</h1>
                   

                    <!-- DataTales Example -->
                   <div class="col-lg-7 col-xl-6 mb-3" style="margin-left:auto;margin-right:auto;">
              <div class="card card-span shadow  px-5 py-4">
                <div class="card-body">
						
			<form class="row align-items-center" method="GET" action="{{ route('docs.mail',['bookid' => $b->id]) }}">
				@csrf
				
				{{ method_field('GET') }}
                    
					<div class="mb-3">
					<label class="form-label" for="formGroupExampleInput">{{__('translation.Email')}}</label>
					<input required class="form-control form-traffico-control" id="formGroupExampleInput" type="email" name="email"/>
					<input required value="{{$b->id}}" class="form-control form-traffico-control" id="formGroupExampleInput" type="hidden" name="id"/>
					</div>
					
					<div class="col-12"><button class="btn btn-success" type="submit">{{__('translation.Send')}}</button></div>
     </div>  
 </div>	 
     
					
					
                  </form>
				   </div>	 
                          
                        </div>
                    </div>

                </div>



@endsection