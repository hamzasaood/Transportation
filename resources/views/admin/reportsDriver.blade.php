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
                                         <form enctype="multipart/form-data" class="form-horizontal simple-form" method="post" action="{{url('/admin/reports/driver')}}">
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
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label ">{{__('translation.PaymentStatus')}}</label>
                                                            <select name="payment" class="form-control">
                                                                <option selected=""></option>
                                                                <option>{{__('translation.Paid')}}</option>
                                                                <option>{{__('translation.Unpaid')}}</option>
                                                            </select>
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
                                            <th>{{__('translation.id')}}</th>
                                            <th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.Price')}} </th>
                                            <th>{{__('translation.FirstName')}} </th>
                                            <th>{{__('translation.LastName')}} </th>
                                            <th>{{__('translation.PhoneNumber')}} </th>
                                            <th>{{__('translation.Email')}}</th>
                                            <th>{{__('translation.OrderDate')}}</th>
                                           
                                            <th>{{__('translation.PaymentStatus')}}</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                           
                                            <th>{{__('translation.id')}}</th>
                                            <th>{{__('translation.OrderNumber')}}</th>
                                            <th>{{__('translation.InvoiceNumber')}}</th>
											<th>{{__('translation.Price')}} </th>
                                            <th>{{__('translation.FirstName')}} </th>
                                            <th>{{__('translation.LastName')}} </th>
                                            <th>{{__('translation.PhoneNumber')}} </th>
                                            <th>{{__('translation.Email')}}</th>
                                            <th>{{__('translation.OrderDate')}}</th>
                                           
                                            <th>{{__('translation.PaymentStatus')}}</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach($orders as $o)
                                        <tr>
                                            <th>{{$o->id}}</th>
                                            <th>{{$o->order_num}}</th>
                                            <th>{{$o->invoice_num}}</th>
											<th>{{$o->price}}</th>
                                            <th>{{$o->firstname}}</th>
                                            <th>{{$o->lastname}}</th>
                                            <th>{{$o->phone_number}}</th>
                                            <th>{{$o->email}}</th>
                                            <th>{{date('d/M/y', strtotime($o->dt))}}</th>
                                            
                                            <th>{{$o->pay_status}}</th>
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