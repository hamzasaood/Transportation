@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.DriverDetails')}}</h1>
                   
				     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
					 
                        <div class="card-body">
						@if (!$users->isEmpty()) 
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
									 @foreach($users as $orders) 
                                        <tr>
											<th>{{__('translation.ProfileImage')}}</th>
											<td><img width="60" src="{{asset ('uploadedimages/images/'.$orders->image)}}"/></td>
                                            </tr>
										
										<tr>
										
										
                                            <th>{{__('translation.DriverName')}}</th>
											 <td>{{$orders->firstname.' '.$orders->lastname;}}</td>
                                            </tr>
											<tr>
											<th>{{__('translation.Email')}}</th>
											<td>{{$orders->email;}}</td>
                                            </tr>
											
											 <tr>
											
											<th>{{__('translation.Attatchments')}}</th>
											 @if($orders->t_doc!='NULL'&&$orders->civil_doc!='NULL') 
											 <td>
											 <a href="
											 {{asset('uploadedimages/'.$orders->t_doc)}}">{{__('translation.T_Doc')}}
											 </a>
											 <br>
											  <a href="
											 {{asset('uploadedimages/'.$orders->civil_doc)}}">{{__('translation.Civil_Doc')}}
											 </a>
											 </td>
											 @else
										   <td>		 
											 {{__('No attatchment Found')}}
											 </td>
											 @endif
											</tr>
											<tr>
											<th>{{__('translation.TruckNumber')}}</th>
											 <td>{{$orders->truck_number}}</td>
											</tr>
											<tr>
											<th>{{__('translation.DOB')}}</th>
											 <td>{{$orders->dob}}</td>
                                           </tr>
										   <tr>
										   <th>{{__('translation.Status')}}</th>
											
										 <td>{{$orders->status}}</td>
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