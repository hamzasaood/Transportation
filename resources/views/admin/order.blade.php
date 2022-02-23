@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> {{__('translation.AssignedOrders')}} </h1>
                   
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <a class="btn btn-primary" href="{{ route('admin.book.create')}}">{{__('translation.CreateOrder')}}</a>
					 
                        <div class="card-body">
						
                            <div class="table-responsive">
							
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                           
                                            <th>{{__('translation.id')}}</th>
											<th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.CustomerName')}}</th>
											<th>{{__('translation.PaymentStatus')}}</th>
											<th>{{__('translation.OrderStatus')}}</th>
											<th>{{__('translation.AssignedDriverName')}}</th>
											<th>{{__('translation.ShareDocs')}}</th>
											<th>{{__('translation.Action')}}</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       @foreach($order as $orders) 
                                        <tr>
										      
                                            <td>{{$orders->bookid;}}</td>
											  <td>{{$orders->order_num;}}</td>
											   <td>{{$orders->invoice_num;}}</td>
											 
											    <td>{{$orders->firstname.' '.$orders->lastname;}}</td>
												<td>{{$orders->pay_status}}</td>
												 
												  <td>
												  @php
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
												<td>
												
												@foreach($users as $user)
												
												@if($orders->did==$user->id)
			<a href="{{ route('driver', ['id' => $orders->did]) }}"><button class="btn btn-success">{{$user->firstname.' '.$user->lastname}}</button></a>
                                               	@endif
												
                                                  @endforeach
                                            										  
												</td>
											  
											   
												<td>
												<div class="mb-3">
							<a class="btn btn-primary" href="{{ route('admin.toemail', ['bookid' => $orders->bookid]) }}">{{__('translation.SendDocs')}}</a>
							</div>
							<div class="mb-3">
							<a class="btn btn-primary" href="{{ route('invoice2', ['bookid' => $orders->bookid]) }}">{{__('translation.DeliveryNote')}}</a>
							</div>
                                                </td>												
												
												
											<td><a class="btn btn-info" href="{{ route('orders.view.as', ['bookid' => $orders->bookid]) }}"><i class="fa fa-eye"></i></a>
											
											
											<a class="btn btn-primary" href="{{ route('admin.editun', ['bookid' => $orders->bookid]) }}"><i class="fa fa-edit"></i></a>
											
											
											<a class="btn btn-danger" onclick="return confirm('{{__('translation.areyousure?')}}')" href="{{ route('order.destroy', ['bookid' => $orders->bookid])}}">
											<i class="fa fa-trash"></i></a></td>
                                           
                                        </tr>
                                        
                                      @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



@endsection





