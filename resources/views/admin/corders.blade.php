@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> {{__('translation.Completed Orders')}} </h1>
                   
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <a class="btn btn-primary" href="{{ route('admin.book.create')}}">Create Order</a>
					 
                        <div class="card-body">
						
                            <div class="table-responsive">
							
                                <table class="table table-bordered" id="tab" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>{{__('translation.id')}}</th>
											<th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.CustomerName')}}</th>
											<th>{{__('translation.PaymentStatus')}}</th>
											<th>{{__('translation.ChangePaymentStatus')}}</th>
											<th>{{__('translation.OrderStatus')}}</th>
											<th>{{__('translation.AssignedDriverName')}}</th>
											<th>{{__('translation.Invoice/Mail')}}</th>
											<th>{{__('translation.Issue Recipt')}}</th>
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
												<td>{{$orders->pay_status}}
					
												</td>
												<td>
				 <form class="row align-items-center" method="POST" action="{{ route('pay.edit') }}">
				@csrf
				
				
					<div class="mb-3">
					<select name="pay" id="categoryFilter" class="form-control">
        <option value="Paid">{{__('translation.Paid')}}</option>
        <option value="UnPaid">{{__('translation.Unpaid')}}</option>
      
      </select>
					</div>
					<input type="hidden" name="id" value="{{$orders->bookid}}"/>
					<div class="col-12"><button class="btn btn-primary" type="submit">{{__('translation.update')}}</button></div>
					
												
								</form>				
												
												
											
												</td>
												 
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
							<a class="btn btn-info" href="{{ route('invoice', ['bookid' => $orders->bookid]) }}">{{__('translation.Invoice')}}</a>
							</div>
							<div class="mb-3">
							<a class="btn btn-primary" href="{{ route('user.mail', ['bookid' => $orders->bookid]) }}">{{__('translation.Share')}}</a>
							</div>
							
									</td>
											   
									
												 
												  
												  
												 
													<td>
									
						
							
							<a class="btn btn-primary" href="{{ route('admin.editextra', ['bookid' => $orders->bookid]) }}">{{__('translation.Issue')}}</a>
									</td>
												
												
												
											<td><a class="btn btn-info" href="{{ route('orders.view.as', ['bookid' => $orders->bookid]) }}"><i class="fa fa-eye"></i></a>
											
											
											<a class="btn btn-primary" href="{{ route('admin.editun', ['bookid' => $orders->bookid]) }}"><i class="fa fa-edit"></i></a>
											
											
											<a class="btn btn-danger" onclick="return confirm('areyousure?')" href="{{ route('order.destroy', ['bookid' => $orders->bookid])}}">
											<i class="fa fa-trash"></i></a></td>
                                           
                                        </tr>
                                        
                                      @endforeach
                                       
                                    </tbody>
                                    
                                    <footer>
                                        
                                             <th>{{__('translation.id')}}</th>
											<th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.CustomerName')}}</th>
											<th>{{__('translation.PaymentStatus')}}</th>
											<th>{{__('translation.ChangePaymentStatus')}}</th>
											<th>{{__('translation.OrderStatus')}}</th>
											<th>{{__('translation.AssignedDriverName')}}</th>
											<th>{{__('translation.Invoice/Mail')}}</th>
											<th>{{__('translation.Issue Recipt')}}</th>
											<th>{{__('translation.Action')}}</th>
                                    </footer>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



@endsection





