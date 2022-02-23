@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Contact Us')}} </h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('translation.Contact Us pages')}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>{{__('translation.Name')}}</th>
                                            <th>{{__('translation.Email')}}</th>
                                            <th>{{__('translation.Message')}}</th>
                                            <th>{{__('translation.Action')}}</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
									@foreach($contact as $cont) 
                                        <tr>
										
                                            <td>{{$cont->name;}}</td>
                                            <td>{{$cont->email;}}</td>
                                            <td>{{$cont->message;}}</td>
                                            <td>
											<a class="btn btn-danger" onclick="return confirm('{{__('translation.areyousure?')}}')" href="{{ route('contact.destroy', ['id' => $cont->id]) }}" >
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