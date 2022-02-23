
@extends('admin.theme.default')



@section('content')
 <style>
        table
        {
            width: auto;
            font: 16px Times New Roman ;
        }
        table, th, td,tr
        {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: right;
        }
		
       
    </style>


@if(App::getLocale() == 'ar')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Delivery Note')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
					 <input type="button" value="{{__('translation.Print')}}" onclick="myApp.printTable()" />
                        <div class="card-body">
						@if (!$order->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table " id="tab" width="100%" cellspacing="0">
                                    <thead>
									<tr>
									
									<td colspan="2">
									<div class="text-center" dir="rtl">
							<h2 style="text-align:center"><img  class=" "  src="{{asset ('app-assets/assets/img/gallery/logo1-02.png')}}"   alt="..." /></h2>
									<h2 style="text-align:center"class="">{{__('translation.The National Transport Company')}}</h2><br>
									     
									 
									</div>
									 <p style="text-align:center">
									 	<span style="text-decoration: underline;">{{__('translation.email1')}} </span>         
									&nbsp;&nbsp;{{__('translation.add1')}} 
									</p>
									
									 <h2 style="text-align:center">{{__('translation.Bill of Lading')}} </h2>

									 <p style="text-align:right;" >{{__('translation.Date')}}:…………………………………………………..</p>
									 <p style="text-align:right;">{{__('translation.This shipment is for the respected Messrs')}}…………………………………………</p>
									 
									 <p style="text-align:right;">{{__('translation.Sent to')}} ………………………………………………..</p>
									 <p style="text-align:right;">{{__('translation.Address')}} …………………………………………………….. </p>
									</td>
									
									</tr>
									<tr>
									<td style="text-align:center" >{{__('translation.Merchandise Description')}}:</td>
									<td style="text-align:center" >{{__('translation.Vehicle Description')}}</td>
									</tr>
									@php  
									
									$total=0;
									@endphp
									 @foreach($order as $orders) 
                                        <tr>
										
										
                                            <td>{{__('translation.Type of merchandise')}} :………………………………</td>
											 <td>{{__('translation.Name of driver')}}:……………………{{$orders->firstname.' '.$orders->lastname}}</td>
                                            </tr>

											<tr>
											<td>{{__('translation.Date of loading')}} :………………………………………</td>
											<td>{{__('translation.Number of vehicle')}}:……………………{{$orders->truck_number}}</td>
                                            </tr>
											<tr>
											<td>{{__('translation.Value')}} :…………………………………………………</td>
											 <td>{{__('translation.Owner of vehicle')}}:……………………{{$orders->firstname.' '.$orders->lastname}}</td>
                                           </tr>
										   <tr>
										   <td>{{__('translation.Weight')}} :………………………………………………..</td>
											 <td>{{__('translation.Type of vehicle')}}:……………………{{$orders->truck_type}}</td>
											 </tr>
											  <tr>
										   <td>{{__('translation.Number of packages')}} :………………………………… </td>
											 <td>{{__('translation.Expenses')}}:……………………{{$orders->price}}</td>
											 </tr>
											 
											@endforeach
                                        
                                    </thead>
                                   
                                    <tbody>
                                      <tr>
									  
									  <td colspan=2>
									<p> {{__('translation.para1')}} </p> 
                                    <p>{{__('translation.para2')}}</p>
									  
									  </td>
									  
									  
									  </tr>
                                       
                                       
                                      
                                       
                                    </tbody>
									<tfoot>
									<tr>
									<td colspan="2">
									<p style="text-align:center" class="text-center" aria-hidden="true">
									{{__('translation.note1')}}
                                     </p>
									 <p style="text-align:right;">{{__('translation.Signature of the driver')}}………………… </p><br>
									<p style="text-align:right;"> {{__('translation.Notes')}}</p>
									 
									 
									<p> 1.………………………………………………………………………….. </p>

                                     <p>2. …………………………………………………………………………..</p>

                                     <p>3.………………………………………………………………………….. </p>

                                     <p>4.………………………………………………………………………….. </p>

 
	<p style="text-align:center" class="text-center">{{__('translation.note2')}}</p> 
									 
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
				
				
				
				<!--end arabic -->
				
	
@else			
		
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Delivery Note')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
					 <input type="button" value="{{__('translation.Print')}}" onclick="myApp.printTable()" />
                        <div class="card-body">
						@if (!$order->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table " id="tab" width="100%" cellspacing="0">
                                    <thead>
									<tr>
									
									<td colspan="2">
									<div class="text-center">
							<h2 style="text-align:center"><img  class=" "  src="{{asset ('app-assets/assets/img/gallery/logo1-02.png')}}"   alt="..." /></h2>
									<h2 style="text-align:center"class="">{{__('translation.The National Transport Company')}}</h2><br>
									     
									 
									</div>
									 <p style="text-align:center">{{__('translation.add1')}}         
									&nbsp;&nbsp; <span style="text-decoration: underline;">{{__('translation.email1')}} </span>
									</p>
									
									 <h2 style="text-align:center">{{__('translation.Bill of Lading')}} </h2>
									 <p style="text-align:left;"class="">{{__('translation.Date')}}:…………………………………………………..</p>
									 <p style="text-align:left;">{{__('translation.This shipment is for the respected Messrs')}}…………………………………………</p>
									 
									 <p style="text-align:left;">{{__('translation.Sent to')}} ………………………………………………..</p>
									 <p style="text-align:left;">{{__('translation.Address')}} …………………………………………………….. </p>
									</td>
									
									</tr>
									<tr>
									<td style="text-align:center" >{{__('translation.Merchandise Description')}}:</td>
									<td style="text-align:center" >{{__('translation.Vehicle Description')}}</td>
									</tr>
									@php  
									
									$total=0;
									@endphp
									 @foreach($order as $orders) 
                                        <tr>
										
										
                                            <td style="text-align:left;">{{__('translation.Type of merchandise')}} :………………………………</td>
											 <td style="text-align:left;">{{__('translation.Name of driver')}}: {{$orders->firstname.' '.$orders->lastname}}</td>
                                            </tr>

											<tr>
											<td style="text-align:left;">{{__('translation.Date of loading')}} :………………………………………</td>
											<td style="text-align:left;">{{__('translation.Number of vehicle')}}: {{$orders->truck_number}}</td>
                                            </tr>
											<tr>
											<td style="text-align:left;">{{__('translation.Value')}} :…………………………………………………</td>
											 <td style="text-align:left;">{{__('translation.Owner of vehicle')}}: {{$orders->firstname.' '.$orders->lastname}}</td>
                                           </tr>
										   <tr>
										   <td style="text-align:left;">{{__('translation.Weight')}} :………………………………………………..</td>
											 <td style="text-align:left;">{{__('translation.Type of vehicle')}}: {{$orders->truck_type}}</td>
											 </tr>
											  <tr>
										   <td style="text-align:left;">{{__('translation.Number of packages')}} :………………………………… </td>
											 <td style="text-align:left;">{{__('translation.Expenses')}}: {{$orders->price}}</td>
											 </tr>
											 
											@endforeach
                                        
                                    </thead>
                                   
                                    <tbody>
                                      <tr>
									  
									  <td colspan=2>
									<p style="text-align:left;"> {{__('translation.para1')}} </p> 
                                    <p style="text-align:left;">{{__('translation.para2')}}</p>
									  
									  </td>
									  
									  
									  </tr>
                                       
                                       
                                      
                                       
                                    </tbody>
									<tfoot>
									<tr>
									<td colspan="2">
									<p style="text-align:center" class="text-center" aria-hidden="true">
									{{__('translation.note1')}}
                                     </p>
									 <p style="text-align:left;">{{__('translation.Signature of the driver')}}………………… </p><br>
									<p style="text-align:left;"> {{__('translation.Notes')}}</p>
									 
									 
									<p style="text-align:left;"> 1.………………………………………………………………………….. </p>

                                     <p style="text-align:left;">2. …………………………………………………………………………..</p>

                                     <p style="text-align:left;">3.………………………………………………………………………….. </p>

                                     <p style="text-align:left;">4.………………………………………………………………………….. </p>

 
	<p style="text-align:center" class="text-center">{{__('translation.note2')}}</p> 
									 
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
				
				
				
	@endif			
				
				
						
				
				
				




@endsection
<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('tab');

            var style = "<style>";
			    
                style = style + "table {width: 100%;font: 14px Times New Roman;}";
                style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: right;}";
                style = style + "</style>";

            var win = window.open('', '', 'height=900,width=1000');
            win.document.write(style);          //  add the style.
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
</script>