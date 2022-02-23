@extends('layouts.app')
<br><br><br><br><br><br><br><br><br><br>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.web')}}" >
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input required id="email" type="email" class="form-control " name="email" autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input required id="password" type="password" class="form-control " name="password"  >

                              
                            </div>
                        </div>
						

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
									
									  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a style="font-size: smaller; margin-left: 7%;" class="form-check-label" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                
                                </div>
                            </div>
                        </div>
						

                        <div class="form-group row ">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
								&nbsp;&nbsp;<label class="form-check-label">OR</label>&nbsp;&nbsp;
                                 <a class="btn btn-primary" href="{{ route('register') }}">
                                        Signup
                                    </a>
                              
                            </div>
							
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
