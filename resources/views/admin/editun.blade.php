@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Edit Orders')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                           
                                <form class="row align-items-center" method="GET" action="{{ route('orders.update',['bookid' => $orders->id]) }}">
				@csrf
				
				{{ method_field('GET') }}
				
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Shipment Status')}}</label>
					<select required class=" form-control form-control-solid" id="formGroupExampleInput" name="shipstatus">
					 <option disabled value="{{$orders->shipstatus}}">{{__('translation.Current Status')}}
					" @php
						 
						 
						if($orders->shipstatus=='1')
						echo __('translation.Pending');
						
						if($orders->shipstatus=='2')
						echo __('translation.InProgress');
						
						if($orders->shipstatus=='3')
						echo __('translation.shipped');
						
						if($orders->shipstatus=='4')
						echo __('translation.Delivered');
						
						if($orders->shipstatus=='5')
						echo __('translation.Complete');
						 @endphp"</option>
					<option value="1">{{__('translation.Pending')}}</option>
					<option value="2">{{__('translation.InProgress')}}</option>
					<option value="3">{{__('translation.shipped')}}</option>
					<option value="4">{{__('translation.Delivered')}}</option>
					<option value="5">{{__('translation.Complete')}}</option>
					
					</select>
					
					
					</div>&nbsp;&nbsp;
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.OrderStatus')}} </label>
					<select  required class="form-control form-traffico-control" id="formGroupExampleInput" name="orderstatus">
					 <option disabled value="{{$orders->orderstatus}}">{{__('translation.OrderStatus')}} 
					"  @php
												 if($orders->orderstatus==0)
    												echo  __('translation.New');
    											if($orders->orderstatus==1)
    												echo __('translation.Pending');
    											if($orders->orderstatus==2)
    												echo __('translation.InProgress');
    											if($orders->orderstatus==3)
    												echo __('translation.Accepted');
    											if($orders->orderstatus==4)
    												echo __('translation.Picked');
    											if($orders->orderstatus==5)
    												echo __('translation.OnTheWay');
    											if($orders->orderstatus==6)
												echo __('translation.Delivered');
											
											
												@endphp"
												</option>
					<option value="0">{{__('translation.New')}}</option>
					<option value="1">{{__('translation.Pending')}}</option>
					<option value="2">{{__('translation.InProgress')}}</option>
					<option value="3">{{__('translation.Accepted')}}</option>
					<option value="4">{{__('translation.Picked')}}</option>
					<option value="5">{{__('translation.OnTheWay')}}</option>
					<option value="6">{{__('translation.Delivered')}}</option>
					
					</select>
					
					</div>&nbsp;&nbsp;
                    
     <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.Select Driver')}}</label>
	<select required class="form-control form-traffico-control" id="formGroupExampleInput" name="did">
					 @foreach ($users as $item)
					 @if($item->usertype=='driver') 
						 @if($orders->did=="$item->id")
						 
					<option disabled  value="{{old('did,$orders->did') }}">{{__('translation.Current Driver')}} "{{$item->firstname." ".$item->lastname}}"</option>
					@endif
					<option  value="{{$item->id}}">{{$item->firstname." ".$item->lastname}}</option>
					@endif
					@endforeach
					</select>
					</div>
					 <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.Select Payment Status')}}</label>
					<select name="pay" id="categoryFilter" class="form-control">
        <option value="paid">{{__('translation.Paid')}}</option>
        <option value="UnPaid">{{__('translation.Unpaid')}}</option>
      
      </select>
					</div>
					<div class="col-12"><button class="btn btn-primary" type="submit">{{__('translation.Save')}}</button></div>
					
					
                  </form>
                            
                        </div>
                    </div>

                </div>



@endsection