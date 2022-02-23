@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Reports')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                             <div class="row">
				                <div class="col-12">
				                    <div class="card p-2">
				                         <form enctype="multipart/form-data" class="form-horizontal simple-form" method="post" action="{{url('/admin/reports/customer/details')}}">
				                         	@csrf
				                            <div class="form-body">
				                                <div class="row">
				                                    <div class="col-md-4">
				                                        <div class="form-group">
				                                            <label class="control-label">{{__('translation.Fromdate')}}</label>
				                                            <input type="date" name="from_date" class="form-control ">
				                                        </div>
				                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label ">{{__('translation.Todate')}}</label>
                                                            <input type="date" name="to_date" class="form-control ">
                                                        </div>
                                                    </div>
                                                    
				                                </div>

				                            </div>
				                            <div class="form-actions mt-2">
				                                <button type="submit" class="btn btn-success btn_valid" name="reports"> <i class="fa fa-check"></i> {{__('translation.Search')}}</button>
				                            </div>
				                            
				                        </form>
				                    </div>
				                </div>
				            </div>

				            @if($orders)
				             <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>{{__('translation.Month')}}</th>
                                            <th>{{__('translation.CustomerName')}}</th>
                                           <th>{{__('translation.PhoneNumber')}}</th>
                                            <th>{{__('translation.NumberofOrderplaced')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>{{__('translation.Month')}}</th>
                                            <th>{{__('translation.CustomerName')}}</th>
                                           <th>{{__('translation.PhoneNumber')}}</th>
                                            <th>{{__('translation.NumberofOrderplaced')}}</th>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($orders as $o)
                                        <tr>
                                            <th>{{date('M/Y', strtotime($o->dt))}}</th>
                                            <th>{{$o->firstname.' '.$o->lastname}}</th>
											 <th>{{$o->phone_number}}</th>
                                            <th>
											@php 
											
                                        echo $o->book_count;
											@endphp
											
											
											
											</th>
											
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                       		</div>
                       		@endif

                        </div>
                    </div>

                </div>



@endsection