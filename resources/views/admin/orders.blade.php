@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.UnassignedOrders')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       <a class="btn btn-primary" href="{{ route('admin.book.create')}}">{{__('translation.CreateOrder')}}</a>
					 
                        <div class="card-body">
						@if (!$order->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>{{__('translation.id')}}</th>
											<th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.CustomerName')}}</th>
											<th>{{__('translation.AssignDriver')}}</th>
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
											
											 
											    
											  
											
												<td>
												@if($orders->orderstatus==2)
												<button class="btn btn-success" href="">{{__('translation.Sent')}}
											<i class="fa fa-check"></i></button>
											@else
											<a class="btn btn-primary" href="{{ route('admin.driver.edit', ['bookid' => $orders->bookid]) }}">
											<i class="fa fa-check"></i></a>
											@endif
											</td>
											<td>
											<a class="btn btn-info" href="{{ route('orders.view.un', ['bookid' => $orders->bookid]) }}"><i class="fa fa-eye"></i></a>
											<a class="btn btn-primary" href="{{ route('admin.editun', ['bookid' => $orders->bookid]) }}">
											<i class="fa fa-edit"></i></a>
											<a class="btn btn-danger" onclick="return confirm('{{__('translation.areyousure?')}}')" href="{{ route('order.destroy', ['bookid' => $orders->bookid]) }}">
											<i class="fa fa-trash"></i></a>
											
											</td>
											
                                           
                                        </tr>
                                        
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