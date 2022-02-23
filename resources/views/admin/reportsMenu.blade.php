@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Reports')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/reports/customer') }}">
                                        <button class="btn btn-lg btn-block btn-primary p-5">{{__('translation.CustomerReport')}}</button>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/reports/driver') }}">
                                        <button class="btn btn-lg btn-block btn-primary p-5">{{__('translation.DriverReport')}}</button> 
                                    </a>                                   
                                </div>
								</div>
								<br>
								 <div class="row">
								<div class="col-sm-4">
                                    <a href="{{ url('/admin/reports/customersummry') }}">
                                        <button class="btn btn-lg btn-block btn-primary p-5">{{__('translation.CustomerSummryReport')}}</button>
                                    </a>
                                </div><br>
                                <div class="col-sm-4">
                                    <a href="{{ url('/admin/reports/driversummry') }}">
                                        <button class="btn btn-lg btn-block btn-primary p-5">{{__('translation.DriverSummryReport')}}</button> 
                                    </a>                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



@endsection