@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.CreateOrder')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                           
                                <form class="row align-items-center" enctype="multipart/form-data" method="POST" action="{{ route('admin.book.store')}}">
				@csrf
				
				{{ method_field('POST') }}
				<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.InvoiceNumber')}}</label>
					<input type="text" class="form-control" name="invoice_num"/>
					
					
					</div>&nbsp;&nbsp;
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Pickup Location')}}</label>
					<input type="text" class="form-control" name="pickuplocation"/>
					
					
					</div>&nbsp;&nbsp;
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Drop Location')}}</label>
					<input type="text" class="form-control" name="droplocation"/>
					
					
					</div>&nbsp;&nbsp;
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Quantity')}}</label>
					<input type="text" class="form-control" name="quantity"/>
					
					
					</div>&nbsp;&nbsp;
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Weight')}}</label>
					<input type="text" class="form-control" name="weight"/>
					</div>&nbsp;&nbsp;
					
				<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Address Direction')}}</label>
					<input type="text" class="form-control" name="adress_dir"/>
					</div>&nbsp;&nbsp;
					
					
					
					
					<div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.RequestedDeliveryDate')}}</label>
					<input type="date" class="form-control" name="requested_delivery_time"/>
					</div>&nbsp;&nbsp;
					
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput">{{__('translation.Shipment Status')}}</label>
					<select required class=" form-control form-control-solid" id="formGroupExampleInput" name="shipstatus">
					 
					<option value="1">{{__('translation.Pending')}}</option>
					<option value="2">{{__('translation.InProgress')}}</option>
					<option value="3">{{__('translation.shipped')}}</option>
					<option value="4">{{__('translation.Delivered')}}</option>
					<option value="5">{{__('translation.Complete')}}</option>
					
					</select>
					
					
					</div>&nbsp;&nbsp;
                    <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.OrderStatus')}}</label>
					<select  required class="form-control form-traffico-control" id="formGroupExampleInput" name="orderstatus">
					 
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
						 
					<option  value="{{$item->id}}">{{$item->firstname.$item->lastname}}</option>
					@endif
					@endforeach
					</select>
					</div>
					 <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.Select Customer')}}</label>
	<select required class="form-control form-traffico-control" id="formGroupExampleInput" name="uid">
					 @foreach ($users as $item)
					 @if($item->usertype=='customer') 
						 
					<option  value="{{$item->id}}">{{$item->firstname.$item->lastname}}</option>
					@endif
					@endforeach
					</select>
					</div>&nbsp;&nbsp;
					 <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.Upload Attatchment')}}</label>
					<input required name="attatchment" type="file" id="input-file-now" class="file-upload form-control" />
					</div>&nbsp;&nbsp;
					 <div class="mb-3"><label class="form-label" for="formGroupExampleInput2">{{__('translation.TruckType')}}</label>
					<select  required class="form-control form-traffico-control" id="formGroupExampleInput" name="truck_type">
					 
					<option value="Normal">{{__('translation.normal')}}</option>
					<option value="Ice Cream">{{__('translation.icecream')}}</option>
					<option value="Cold">{{__('translation.cold')}}</option>
					
					</select>
					
					</div>
					<div class="col-12"><button class="btn btn-primary" type="submit">{{__('translation.Save')}}</button></div>
					
					
                  </form>
                            
                        </div>
                    </div>

                </div>



@endsection