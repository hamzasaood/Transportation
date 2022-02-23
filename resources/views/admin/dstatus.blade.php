@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.DriverRidePrice')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
						<div class="row">
						<div class="col-3">
						&nbsp;&nbsp;<label class="form-label" for="formGroupExampleInput">{{__('translation.Enter Price For The Ride')}}</label>
						</div>
                          <div class="col-9">
                                <form class="row align-items-center" method="GET" action="{{ route('admin.driver.update',['bookid' => $order->id]) }}">
				@csrf
				
				{{ method_field('GET') }}
                    <div class="mb-3">
					
					<input type="text" required class="form-control form-traffico-control" id="formGroupExampleInput" name="price"></input>
					
					</div>
     </div>  
 </div>	 
     
					<div class="row">
					<div class="col-4">
					</div>
					<div class="col-8"><button class="btn btn-primary" type="submit">{{__('translation.Save')}}</button></div>
					</div>
					
                  </form>
                          
                        </div>
                    </div>

                </div>



@endsection