
@extends('admin.theme.default')



@section('content')
 <style>
        table
        {
            width: auto;
            font: 17px Calibri;
        }
        table, th, td,tr
        {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
		
       
    </style>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Order Invoice')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
					 <input type="button" value="{{__('translation.Print')}}" onclick="myApp.printTable()" />
                        <div class="card-body">
						@if (!$order->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table " id="tab" width="100%" cellspacing="0">
                                    <thead>
									<tr>
									
									<th colspan="2">
									<div class="text-center">
									<img  class=" "  src="{{asset ('app-assets/assets/img/gallery/logo1-02.png')}}"   alt="..." />
									 
									</div>
									<h3 style="text-align:center"class="">{{__('translation.The National Transport Company')}}</h3>
									 <h4 style="text-align:right"class="">{{__('translation.Date')}}:{{date('Y/m/d')}}</h3>
									</th>
									
									</tr>
									
									@php  
									
									$total=0;
									@endphp
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
											<th>{{__('translation.TruckType')}}</th>
											<td>{{$orders->truck_type;}}</td>
											</tr>
											
											
											
												
												<tr>
											<th>{{__('translation.Price')}}</th>
												<td>
												{{$orders->price}}
												</td>
											</tr>
											
												<tr>
											<th>{{__('translation.Extra Charges')}}</th>
												<td>
												{{$orders->extra_charges}}
												</td>
											</tr>
											<tr>
											@php 
											$total=$orders->price+$orders->extra_charges;
											@endphp
											@endforeach
											<th>{{__('translation.Total')}}</th>
												<td>
												{{$total}}
												</td>
											</tr>
                                        
                                    </thead>
                                   
                                    <tbody>
                                      
                                       
                                       
                                      
                                       
                                    </tbody>
									<tfoot>
									<tr>
									<td colspan="2">
									<h4 class="text-center" aria-hidden="true">
									<br>شركة الناقل الوطني لنقل البضائع<br>
									جليب الشيوخ - مجمع بدر - الدورا - مكتب 3<br>
									{{__('translation.add2')}}<br>
									<i class="fa fa-phone"></i> 24336461 <i class="fa fa-phone"></i>66240450 
								<i class="fa fa-envelope"></i> The.NTC.kw@gmail.com
                                     </h4>
									</td>
									</tr>
									</tfoot>
                                </table>
                            </div>
							
							@else
							<label>{{__('translation.NoRecordsFound')}}</label>
							@endif
                        </div>
                    </div>

                </div>
				
				
				
				
				
				
				
				
				
				




@endsection
<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('tab');

            var style = "<style>";
			    
                style = style + "table {width: 100%;font: 17px Calibri;}";
                style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";

            var win = window.open('', '', 'height=700,width=700');
            win.document.write(style);          //  add the style.
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
</script>