<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'dob' => ['required', 'string', 'max:255'],
			
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'phone_number' => ['required', 'string', 'max:255'],
			
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
	    
        return User::create([
            'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'dob' => $data['dob'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'phone_number' => $data['phone_number'],
			'is_admin' => '0',
        ]);
		
			
    }
	
	public function register(Request $request)
    {
		 
		 if(Request()->wantsJson()){
       
			
		
		if($request->usertype=="driver"){
			$request->validate([
           'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'dob' => ['required', 'string', 'max:255'],
			'usertype' => ['required', 'string', 'max:255'],
			't_doc' => ['required', 'mimes:doc,docx,pdf,txt', 'max:2048'],
			'civil_doc' => ['required','mimes:doc,docx,pdf,txt', 'max:2048'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
			'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8'],
			'truck_number' => ['required', 'string', 'max:255'],
			'image'    =>  ['mimes:png,jpeg', 'max:2048']
        ]);
		
		$t_doc = time().'.'.$request->t_doc->getClientOriginalExtension();
  $request->t_doc->move(public_path('/uploadedimages'), $t_doc);
  
$civil_doc = time().'.'.$request->civil_doc->getClientOriginalExtension();
  $request->civil_doc->move(public_path('/uploadedimages'), $civil_doc);
  if($request->image){
  $image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  }
  else{
	  $image="Null";
  }
            //store file into document folder
            //$file = $request->file->register('public/documents');
			//$files = $request->file->register('public/documents');
			$token = Str::random(60);
			$user = User::create([
            'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'dob' => $request->dob,
			'usertype' => $request->usertype,
			't_doc' => $t_doc,
			'civil_doc' => $civil_doc,
            'email' => $request->email,
            'password' => Hash::make($request->password),
			 'truck_number' => $request->truck_number,
			 'image' => $image,
			'api_token' => Hash::make($token),
			'phone_number' => $request->phone_number,
			'is_admin' => '0',
			'status'  => 'pending'
        ]);
		 
          return response()->json(['message'=>'success','code'=>'000','email'=>$user['email'],'firstname'=>$user['firstname'],'lastname'=>$user['lastname'],'uid'=>$user['id'],'usertype'=>$user['usertype']  ]);
		}
		else{
        $request->validate([
           'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'dob' => ['required', 'string', 'max:255'],
			'usertype' => ['required', 'string', 'max:255'],
			'image'    =>  ['mimes:png,jpeg', 'max:2048'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
			'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8']
        ]);
		if($request->image){
  $image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  }
  else{
	  $image="Null";
  }
		$token = Str::random(60);
		 $user = User::create([
            'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'dob' => $request->dob,
			'usertype' => $request->usertype,
            'email' => $request->email,
			'image' => $image,
            'password' => Hash::make($request->password),
			'api_token' => Hash::make($token),
			'phone_number' => $request->phone_number,
			'is_admin' => '0',
			'status'  => 'approved'
        ]);
          return response()->json(['message'=>'success','code'=>'000','email'=>$user['email'],'firstname'=>$user['firstname'],'lastname'=>$user['lastname'],
          'uid'=>$user['id'],'usertype'=>$user['usertype']  ]);
      
		
		
		
		}

       
    }
	else{
		
		
		
		
		 $request->validate([
           'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'dob' => ['required', 'string', 'max:255'],
			
			
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
			'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8']
        ]);
		$token = Str::random(60);
		 $user = User::create([
            'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'dob' => $request->dob,
			'usertype' => 'customer',
            'email' => $request->email,
            'password' => Hash::make($request->password),
			'api_token' => Hash::make($token),
			'phone_number' => $request->phone_number,
			'is_admin' => '0'
        ]);
          return redirect()->route('login');
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
	
	
	
	
		
	}	
		
		
	
}
