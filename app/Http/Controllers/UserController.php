<?php

namespace App\Http\Controllers;
use File;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Book as BookM;
use App\Models\User;
use Carbon\Carbon;






class UserController extends Controller
{
	
	public function show($id)
    {
		$utype = User::findOrFail($id);
	 
		if($utype->usertype == "customer")
	{
        $user = User::where('id',$id)->get()->makeHidden(['t_doc','civil_doc','truck_number']);
		$useri = DB::table('users')->where('id',$id)->value('image');
		//$im=implode($useri);
if ($utype) {
            return response()->json([
                'success' => true,
                'code' => '000',
                'message' => 'User Details!',
				'image'  =>  asset('/uploadedimages/images/'.$useri),
				
                'data'    => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => '999',
                'message' => 'User Not Found!'
			    
                
            ], 404);
        }
   }
	else{
			
			
		 $users = DB::table('users')->where('id',$id)->get();
		$usersi = DB::table('users')->where('id',$id)->value('image');
		//$im=implode($useri);
if ($users&&$usersi) {
            return response()->json([
                'success' => true,
                'code' => '000',
                'message' => 'User Details!',
				'image'  =>  asset('/uploadedimages/images/'.$usersi),
				
                'data'    => $users
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => '999',
                'message' => 'User Not Found!'
                
            ], 404);
        }
			
			
			
			
			
			
		}
		
		
		
		
		
		
		
    }
	
	public function showall(Request $request)
    {
		$validator = Validator::make($request->all(), [
           
			
			'usertype' => [ 'string', 'max:255']
			
        ]);if($validator->fails()) {
return response()->json([
                'success' => false,
				'code'    => '999',
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
        $user = DB::table('users')->where('usertype',$request->usertype)->get();
		
if ($user) {
            return response()->json([
                'success' => true,
                'code' => '000',
                'message' => 'Users Details!',
				

			   'data'    => $user
				
				
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => '999',
                'message' => 'Users Not Found!'
                
            ], 404);
        }
    }
	
	}
	
	
	public function update(Request $request,$id)
    {
        //validate data
		if($request->usertype=="driver"){
       $validator = Validator::make($request->all(), [
           'firstname' => [ 'string', 'max:255'],
			'lastname' => [ 'string', 'max:255'],
			'email' => ['email'],
			
			'usertype' => [ 'string', 'max:255'],
			't_doc' => [ 'mimes:doc,docx,pdf,txt', 'max:2048'],
			'civil_doc' => ['mimes:doc,docx,pdf,txt', 'max:2048'],
             'truck_number' => [ 'string', 'max:255'],
			'image'    =>  ['max:2048'],
           
			'phone_number' => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:8']
        ]);
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	if ($request->t_doc && $request->civil_doc && $request->image)
	{
		
	$t_doc = time().'.'.$request->t_doc->getClientOriginalExtension();
  $request->t_doc->move(public_path('/uploadedimages'), $t_doc);
 
$civil_doc = time().'.'.$request->civil_doc->getClientOriginalExtension();
  $request->civil_doc->move(public_path('/uploadedimages'), $civil_doc);
	
	$image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  
	$user = User::whereId($id)->update($request->all(),$request->except('t_doc', 'civil_doc','image'));
	
	$user = User::whereId($id)->update([
	't_doc'=> $t_doc,
	'civil_doc' => $civil_doc,
	'image' => $image,
	]);
if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Driver Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Driver Failed to Update!',
                ], 500);
            }
	}
	else {
$user = User::whereId($id)->update($request->all());
if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Driver Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Driver Failed to Update!',
                ], 500);
            }
	}
}
		}
		
		else{
			
			
			    $validator = Validator::make($request->all(), [
           'firstname' => [ 'string', 'max:255'],
			'lastname' => [ 'string', 'max:255'],
			'email' => ['email'],
			
			'usertype' => [ 'string', 'max:255'],
			
            
			'image'    =>  [ 'max:2048'],
           
			'phone_number' => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:8']
        ]);
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	if ($request->image)
	{
		
	
	$image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  
	$user = User::whereId($id)->update($request->all(),$request->except('image'));
	
	$user = User::whereId($id)->update([
	
	'image' => $image,
	]);
if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Driver Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Driver Failed to Update!',
                ], 500);
            }
	}
	else {
$user = User::whereId($id)->update($request->all(),$request->except('t_doc','civil_doc','truck_number'));
            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Updated successfully!'
                ], 200);
                       } 
		    else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Failed to Update!'
                ], 500);
            }
	}

}
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		
}










 public function report(Request $request)
    {
       $start_date = Carbon::parse($request->start_date)
                             ->toDateTimeString();

       $end_date = Carbon::parse($request->end_date)
                             ->toDateTimeString();
	
	
	$driver=User::whereBetween('created_at',[$start_date,$end_date])->where('usertype','driver')->count();
    $customer=User::whereBetween('created_at',[$start_date,$end_date])->where('usertype','customer')->count();
    $orders=BookM::whereBetween('created_at',[$start_date,$end_date])->count();      
	$inprogress=BookM::whereBetween('created_at',[$start_date,$end_date])->where('orderstatus','3')->count();
	$pending=BookM::whereBetween('created_at',[$start_date,$end_date])->where('orderstatus','2')->count();
	$comp=BookM::whereBetween('created_at',[$start_date,$end_date])->where('orderstatus','6')->count();


	 
	  
	  
	   if ($driver||$customer||$orders||$inprogress||$pending||$comp) {
                return response()->json([
                    'success' => true,
                    'message' => 'Record Found successfully!',
					'code'    => '000',
					'total_orders' => $orders,
					'total_customers' => $customer,
					'total_drivers' => $driver,
					'total_orders_inprogress' => $inprogress,
					'total_orders_pending' => $pending,
					'total_orders_complete' => $comp
					
                ], 200);
                       } 
		    else {
                return response()->json([
                    'success' => false,
                    'message' => 'No Record Found!',
					'code'    => '999'
                ], 500);
            }

    }







	public function mapapi(Request $request)
	{
		
		 $validator = Validator::make($request->all(), [
            'longitude'     => 'required',
            
			'latitude'   => 'required',
			
			
        ]);
		
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} 

else {
	$lat=$request->latitude;
	$long=$request->longitude;
 $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$long.'&key=AIzaSyCAy0MFjGPhK13uvVzSwXca7VOuoZIKcs0');
           
            $output = json_decode($geocodeFromLatLong);
            $status = $output->status;
            //Get address from json data
            $address = ($status=="OK")?$output->results[1]->formatted_address:'';
           
            //Return address of the given latitude and longitude
            if(!empty($address)){
                return response()->json([
                'success' => true,
                'message' => 'TRue',
                'data'    => $address
            ],200);
            }else{
                return false;
            }
		
		
	}



	}








}
