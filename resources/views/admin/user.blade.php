@extends('admin.theme.default')



@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">{{__('translation.Registered Users')}}</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                         <a class="btn btn-primary" href="{{ route('user.add')}}">{{__('translation.Create User')}}</a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										    <th>{{__('translation.ProfileImage')}} </th>
                                            <th>{{__('translation.FirstName')}}</th>
                                            <th>{{__('translation.LastName')}}</th>
                                            <th>{{__('translation.Email')}}</th>
                                            <th>{{__('translation.Usertype')}}</th>
                                             <th>{{__('translation.Action')}}</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
									
									@foreach($users as $user) 
                                        <tr>
										    <td><img width="60" src="{{asset ('uploadedimages/images/'.$user->image)}}"/></td>
                                            <td>{{$user->firstname}}</td>
                                            <td>{{$user->lastname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->usertype}}</td>
                                           <td>
										   <a class="btn btn-primary "  href="{{ route('user.edit', ['id' => $user->id]) }}">
											<i class="fa fa-edit"></i></a>
											<a class="btn btn-danger " onclick="return confirm('{{__('translation.areyousure?')}}')" href="{{ route('user.destroy', ['id' => $user->id]) }}">
											<i class="fa fa-trash"></i></a>
											
											</td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



@endsection