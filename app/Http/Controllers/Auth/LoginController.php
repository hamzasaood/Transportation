<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
       $this->middleware('guest')->except('logout');
    }
	
	 public function login(Request $request)
    {  
        $inputVal = $request->all();
        if(Request()->wantsJson()){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
			'usertype' => 'required',
        ]);
		}
		else {
			 $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
			
        ]);
			
		}
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password'],'usertype' => $inputVal['usertype']))){
			
			
            if (Auth::user()&& auth()->user()->usertype == 'admin') {
				
				
                return redirect()->route('admin.route');
				
            }
			
			 if (Auth::user()&& auth()->user()->usertype == 'driver') {
				if(Request()->wantsJson()){
				return response()->json(['message'=>'success','code'=>'000','email'=>$inputVal['email'],'firstname'=>auth()->user()->firstname,
			 'lastname'=>auth()->user()->lastname,
			'phone_number'=> auth()->user()->phone_number,'dob'=>auth()->user()->dob,'uid'=>auth()->user()->id,'usertype'=>$inputVal['usertype'],
			'image'=> asset('/uploadedimages/images/'.auth()->user()->image),'t_doc'=> asset('/uploadedimages/'.auth()->user()->t_doc),
			'civil_doc'=> asset('/uploadedimages/'.auth()->user()->civil_doc)], 200);
				}
				else{
                return redirect()->route('admin.route');
				}
            }
			else{
				if(Request()->wantsJson()){
				return response()->json(['message'=>'success','code'=>'000','email'=>$inputVal['email'],'firstname'=>auth()->user()->firstname,
			 'lastname'=>auth()->user()->lastname,
			 'phone_number'=>auth()->user()->phone_number,'dob'=>auth()->user()->dob,'uid'=>auth()->user()->id,'usertype'=>$inputVal['usertype'],
			 'image'=> asset('/uploadedimages/images/'.auth()->user()->image)], 200);
				}
				else{
                return redirect()->route('home');
				}
               
            }
        }
		else{
			if(Request()->wantsJson()){
			return response()->json([
                    'success' => false,
                    'message' => 'login Failed !',
                    'code'   => '999',
                
                ], 400);
            
			}
			return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
				
        }     
    }
	
	
	
	
	
	public function loginweb(Request $request)
    {  
        $inputVal = $request->all();
        if(Request()->wantsJson()){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
			'usertype' => 'required',
        ]);
		}
		else {
			 $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
			
        ]);
			
		}
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
			
			
            if (Auth::user()&& auth()->user()->usertype == 'admin') {
				
				
                return redirect()->route('admin.route');
				
            }
			
			 if (Auth::user()&& auth()->user()->usertype == 'driver') {
				if(Request()->wantsJson()){
				return response()->json(['message'=>'success','code'=>'000','email'=>$inputVal['email'],'firstname'=>auth()->user()->firstname,
			 'lastname'=>auth()->user()->lastname,
			'phone_number'=> auth()->user()->phone_number,'dob'=>auth()->user()->dob,'uid'=>auth()->user()->id,'usertype'=>$inputVal['usertype'],
			'image'=> asset('/uploadedimages/images/'.auth()->user()->image),'t_doc'=> asset('/uploadedimages/'.auth()->user()->t_doc),
			'civil_doc'=> asset('/uploadedimages/'.auth()->user()->civil_doc)], 200);
				}
				else{
                return redirect()->route('admin.route');
				}
            }
			else{
				if(Request()->wantsJson()){
				return response()->json(['message'=>'success','code'=>'000','email'=>$inputVal['email'],'firstname'=>auth()->user()->firstname,
			 'lastname'=>auth()->user()->lastname,
			 'phone_number'=>auth()->user()->phone_number,'dob'=>auth()->user()->dob,'uid'=>auth()->user()->id,'usertype'=>$inputVal['usertype'],
			 'image'=> asset('/uploadedimages/images/'.auth()->user()->image)], 200);
				}
				else{
                return redirect()->route('home');
				}
               
            }
        }
		else{
			if(Request()->wantsJson()){
			return response()->json([
                    'success' => false,
                    'message' => 'login Failed !',
                    'code'   => '999',
                
                ], 400);
            
			}
			return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
				
        }     
    }
	
	
	
	
	
	
	
	
	
	
	 public function adminloginview()
    { 
	
	return view('auth.alogin');
	
	}
	
	 public function adminlogin(Request $request)
    {  
        $inputVal = $request->all();
      
			 $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
			
        ]);
			
		
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
			
			
            if (Auth::user()&& auth()->user()->usertype == 'admin') {
				
				
                return redirect()->route('admin.route');
				
            }
			
			
		
		     
    }
	else{
			
			return redirect()->route('login.web.view')
                ->with('error','Email & Password are incorrect.');
				
        }
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
