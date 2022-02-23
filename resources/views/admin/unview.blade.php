@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Order Details')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
					 
                        <div class="card-body">
						@if (!$order->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
									 @foreach($order as $orders) 
                                        <tr>
										
										
                                            <th>{{__('translation.CustomerName')}}</th>
											 <td>{{$orders->firstname.' '.$orders->lastname;}}</td>
                                            </tr>
											<tr>
											<th>{{__('translation.Email')}}</th>
											<td>{{$orders->email;}}</td>
                                            </tr>
											<tr>
											<th>{{__('translation.OrderNumber')}}</th>
											 <td>{{$orders->order_num;}}</td>
                                           </tr>
										   <tr>
										   <th>{{__('translation.InvoiceNumber')}}</th>
											 <td>{{$orders->invoice_num;}}</td>
											 </tr>
											 <tr>
											
											<th>{{__('translation.Attatchment')}}</th>
											 @if($orders->attatchment!='NULL') 
											 <td>
											 <a href="
											 {{asset('Order_Docs/'.$orders->attatchment)}}">{{$orders->attatchment}}
											 </a>
											 </td>
											 @else
										   <td>	
										    {{__('translation.NoattatchmentFound')}}
											 </td>
											 @endif
											</tr>
											<tr>
											<th>{{__('translation.Pickup Location')}}</th>
											 <td>{{$orders->pickuplocation;}}</td>
											</tr>
											<tr>
											<th>{{__('translation.Drop Location')}}</th>
											 <td>{{$orders->droplocation;}}</td>
                                           </tr>
										   <tr>
										   <th>{{__('translation.Quantity')}}</th>
											
										 <td>{{$orders->quantity;}}</td>
											</tr>
											<tr>
											<th>{{__('translation.Weight')}}</th>
											  <td>{{$orders->weight;}}</td>
											  </tr>
											  <tr>
											<th>{{__('translation.RequestedDeliveryDate')}}</th>
											 <td>{{$orders->requested_delivery_date;}}</td>
											</tr>
											<tr>
											<th>{{__('translation.TruckType')}}</th>
											<td>{{$orders->truck_type;}}</td>
											</tr>
											<tr>
											<th>{{__('translation.OrderStatus')}}</th>
											<td>@php
											
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
											
												@endphp</td>
												</tr>
												<tr>
											<th>{{__('translation.ShipStatus')}}</th>
											
											<td>@php
												if($orders->shipstatus==1)
												
											 echo __('translation.Pending'); 
											if($orders->shipstatus==2)
											  echo	__('translation.InProgress');
											if($orders->shipstatus==3)
											 echo	__('translation.shipped');
											if($orders->shipstatus==4)
											echo	__('translation.Delivered');
											if($orders->shipstatus==5)
											echo	__('translation.Complete');
												
												@endphp
												</td>
												</tr>
												<tr>
												<th>{{__('translation.Price')}}</th>
												<td>
												{{$orders->price}}
												</td>
												</tr>
											
											
                                        
                                    </thead>
                                   
                                    <tbody>
                                      
                                       
                                       
                                      @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
							
							@else
							<label>{{__('translation.NoRecordsFound')}}</label>
							@endif
                        </div>
                    </div>

                </div>



@endsection