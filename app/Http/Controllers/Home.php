<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\ContactUs;
use App\Models\User;
use AuthenticatesUsers;

class Home extends Controller
{
	 public function __construct()
    {
        //$this->middleware('auth')->except('index');
		
    }
    public function index()
   {
     return view('home');
   }
   
   
   public function about()
   {
     return view('about');
   }
   
   
   public function signup()
   {
     return view('signup');
   }
   
   
   public function oops()
   {
     return view('oops');
   }
    public function terms()
   {
     return view('terms');
   }
   public function privacy()
   {
     return view('privacy');
   }
   public function myaccount()
   {
	   if(Auth::check())
	   {
		   if(auth()->user()->usertype!="admin")
	   {
     return view('myaccount');
	   } 
	   else{
		   return redirect()->route('admin.route');
		  
	   }
	   }
	   else{
		   echo "<script>alert('You are not allowed')</script>";
		   return view('/home');
	   }
   }
   
    public function contact(Request $request)
   {
	   
	   $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'   => 'required',
			'message'   => 'required',
			
        ]);
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	//$id = Auth::user()->id;


$contact = ContactUs::create([
                
               
                'name'     => $request->input('name'),
                'email'   => $request->input('email'),
				'message'     => $request->input('message'),
                
            ]);
if ($contact) {
               /* return response()->json([
                    'success' => true,
					'message' => 'Saved Successfully',
                    
                ], 200);*/
				$success="success";
				$message="Saved We will get back to you soon!";

		return view('home',compact('message','success'));
		
				//return redirect()->back()->with('message', json_encode(['success'=>'Saved Successfully']));
            } 
			
			else {
               /* return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Save!',
                ], 400);*/
				
				
		return view('home');
            }
        }
	   
    // return view('myaccount');
   }
   
    public function editu()
   {
	   if(Auth::check())
	   {
		   $id=auth()->user()->id;
	   $users = User::all()->where('id',$id);
     return view('editu',compact('users'));
	   }
	   else{
		   
		   return view('/home');
	   }
   }
   public function updatepass(Request $request)
    {
        
		 if(Auth::check())
	   {
		   if($request->password==$request->cpassword)
		   {
		   
        $id=auth()->user()->id;
$user = User::where('id',$id)->update([
                'firstname'     => $request->fname,
				'lastname'     => $request->lname,
				
				'dob'     => $request->dob,
				'phone_number'     => $request->phone_number,
                'password'     => Hash::make($request->password)
            ]);
if ($user) {
	            $success="success";
				$message="Updated Successfully";
	            
			

               return view('/myaccount',compact('message','success'));
            } 
			
			else {
				$success="warning";
				$message="Not Updated";
				
              return view('/myaccount',compact('message','success'));
            }
	
	   }
	   else{
		        $success="warning";
				$message="passwords do not match";
		   
           return redirect()->back()->with(compact('message', 'success'));	   
		   }
	   } else{
		  
		   return view('/home');
		   
	   }
	   
	   
}




   
   
   
   
}
