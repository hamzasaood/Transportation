<?php

namespace App\Http\Controllers;
use File;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Book as BookM;
use App\Models\User;

class Book extends Controller
{
     public function index()
   {
	   if (Auth::check()) {
	   
     return view('book');
	   }
	   else {
		   
		   return view('auth.login');
	   }
   }
   
   
    public function form(Request $request)
   {
	   if (Auth::check()) {
		   $validator = Validator::make($request->all(), [
            'invoice_num'     => 'required',
           // 'attatchment'   => 'required',
			'pickuplocation'   => 'required',
			'droplocation'   => 'required',
			'quantity'   => 'required',
			'weight'   => 'required',
			'adress_dir'   => 'required',
			'requested_delivery_date'   => 'required',
			
			
        ]);
		
if($validator->fails()) {
	 
		   return view('book');
} else{
	


		   $invoice=$request->invoice_num;
	   $qty=$request->quantity;
	   $weight=$request->weight;
	   $pick=$request->pickuplocation;
	   $drop=$request->droplocation;
	   $d8=$request->requested_delivery_date;
	   $truck=$request->truck_type;
	   if(isset($request->attatchment)){
		   $r=$request->attatchment;
		$doc = time().'.'.$r->getClientOriginalExtension();
$request->attatchment->move(public_path('/Order_Docs'), $doc);

  
	}
	else{
		$doc='NULL';
	}
	   
	   

	   $file=$doc;
       
	   $adr=$request->adress_dir;
	   
     return view('books',compact('invoice','qty','weight','pick','drop','d8','truck','file','adr'));
}
	   }
	   
	   
	   
	   else {
		    
		   return view('auth.login');
	   }
   }
  protected $id;
  
  
  
   public function store(Request $request)
    {
		//if (Auth::check()) {

        //validate data
		
        $validator = Validator::make($request->all(), [
            'invoice_num'     => 'required',
            
			'pickuplocation'   => 'required',
			'droplocation'   => 'required',
			'quantity'   => 'required',
			'weight'   => 'required',
			'adress_dir'   => 'required',
			'requested_delivery_date'   => 'required',
			'requested_delivery_time'   => 'required',
			'uid'   => 'required',
			
        ]);
		
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	//$id = Auth::user()->id;
	
	if(isset($request->attatchment)){
$doc = time().'.'.$request->attatchment->getClientOriginalExtension();
  $request->attatchment->move(public_path('/Order_Docs'), $doc);
}
else{
    $doc='NULL';
}
$lp=$request->pickuplocation;
$ld=$request->droplocation;
 $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lp.'&key=AIzaSyCAy0MFjGPhK13uvVzSwXca7VOuoZIKcs0');
           
            $output = json_decode($geocodeFromLatLong);
            $status = $output->status;
            //Get address from json data
            $address = ($status=="OK")?$output->results[1]->formatted_address:'';
			
			
			$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$ld.'&key=AIzaSyCAy0MFjGPhK13uvVzSwXca7VOuoZIKcs0');
           
            $out = json_decode($geocode);
            $st = $out->status;
            //Get address from json data
            $addressd = ($st=="OK")?$out->results[1]->formatted_address:'';
           
            //Return address of the given latitude and longitude
            
$book = BookM::create([
                'uid' =>  $request->input('uid'),
               'order_num'=> 1,
                'invoice_num'     => $request->input('invoice_num'),
                'attatchment'   => $doc,
				'pickuplocation'     => $address,
                'droplocation'   => $addressd, 
				'pick_latlong'  => $lp,
				'drop_latlong'  => $ld,
				'quantity'     => $request->input('quantity'),
                'weight'   => $request->input('weight'),
				 'adress_dir'     => $request->input('adress_dir'),
               // 'content'   => $request->input('content'),
				 'requested_delivery_date'     => $request->input('requested_delivery_date'),
                'requested_delivery_time'   => $request->input('requested_delivery_time'),
				'truck_type'   => $request->input('truck_type'),
				'did'   => '0',
				'orderstatus'   => '0',
				'shipstatus'   =>  '1',
				'price'   =>  '0',
				'd_status'   =>  '0',
				'pay_status'   =>  'unpaid'
            ]);
			 $id = DB::getPdo()->lastInsertId();
			 $on= $id.str_pad(rand(0,9), 3, "0", STR_PAD_LEFT);
			  BookM::where('id', $id)->update(['order_num' => $on ]);

			if($book->orderstatus==0){
				
				$st="New";
			}
			if($book->shipstatus==1){
				
				$sts="Pending";
				
			}
			
			
			$firebaseToken = $request->input('uid');
          
        $SERVER_API_KEY = 'AAAAaOYBKtA:APA91bH-cB_NqLR4ZlklrlbIN8cbbVoT09jETymB466aDOwmcpc4zWQVQA8iBsCKQ7TwJ66RkrUP6y57MiJpgltTebRO6DMsqZs7vXDohVbYMlNboOx2pAvvyDmW2YAFP4mm1LeYdG6t';
  
        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => 'Order Created',
                "body" => 'Your Order is created successfully.!',  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        
if ($book&&$response) {
	
	
	
	
	
	
	
                return response()->json([
                    'success' => true,
                    'code'  => '000',
					'message' => 'Saved Successfully',
					'uid'   => $request->input('uid'),
                    'order_num' => $on,
					'invoice_num' => $request->input('invoice_num'),
					'pickuplocation' => $address,
					'droplocation' => $addressd,
					'pickup_latlong'  => $lp,
				    'drop_latlong'  => $ld,
					'quantity' => $request->input('quantity'),
					'weight' => $request->input('weight'),
					'adress_dir' => $request->input('adress_dir'),
					'requested_delivery_date' => $request->input('requested_delivery_date'),
					'requested_delivery_time' => $request->input('requested_delivery_time'),
					'truck_type' => $request->input('truck_type'),
					
					'did'   => '0',
					'orderstatus'   => $st,
					'shipstatus'   => $sts
					
					
                ], 200);
				
				
				
				
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Details Failed to Save!',
                    'code'    => '999'
                ], 400);
            }
        }
    }
	
	public function show($id)
    {
        $book = DB::table('book')->where('uid',$id)->get();
if ($book->count() > 0) {
            return response()->json([
                'success' => true,
                'code' =>  '000',
                'message' => 'Details ',
                'data'    => $book,
               	'country' => 'Pakistan',
				'city'  =>   'Lahore'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Details Not Found!',
                'code' =>  '999',
            ], 404);
        }
    }
	
	
	public function shows($id)
    {
		//Post::whereId($id)->first();
		$book = DB::table('book')
            ->leftJoin('users', 'users.id', '=','book.did')->Join('users as u2','u2.id','=','book.uid')
            ->where('users.id','=',$id)->select('book.*','book.id as bookid','u2.firstname','u2.lastname')
            ->get();
		
	
       
if ($book->count() > 0) {
            return response()->json([
                'success' => true,
                'code' =>  '000',
                'message' => 'Details ',
                'data'    => $book,
            'country' => 'Pakistan',
			 'city'  =>   'Lahore'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Details Not Found!',
                'code' =>  '999',
            ], 404);
        }
   


   
   
   
   
   
   
	}
	
	
	
	
		public function showbyid($id)
    {
		//Post::whereId($id)->first();
		$book = DB::table('book')
            ->leftJoin('users', 'users.id', '=','book.uid')->Join('users as u2','u2.id','=','book.uid')
            ->where('book.id','=',$id)->select('book.*','book.id as bookid','u2.firstname','u2.lastname')
            ->get();
		
	
       
if ($book->count() > 0) {
            return response()->json([
                'success' => true,
                'code' =>  '000',
                'message' => 'Details ',
                'data'    => $book,
            
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Details Not Found!',
                'code' =>  '999',
            ], 404);
        }
	}
	
	public function unassignedordershow($status)
    {
       	$book = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')->where('book.orderstatus',$status)->select('book.*','book.id as bookid','users.firstname','users.lastname')
            ->get();
           
if ($book->count() > 0) {
            return response()->json([
               'success' => true,
                    'code'  => '000',
					'message' => 'Details',
					'data'   =>  $book,
					'country' => 'Pakistan',
					'city'  =>   'Lahore'
			
		
            ], 200);
        } 
        else {
            return response()->json([
                'success' => false,
                'code'  => '999',
                'message' => 'Details Not Found!',
                'data'    => ''
            ], 404);
            }
            
        	
	}
	
	public function updateship(Request $request,$id)
	{
		
		
		 $validator = Validator::make($request->all(), [
            'shipstatus'     => 'required',
            
        ]
            
        );
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
$book = BookM::whereId($id)->update([
                'shipstatus'     => $request->input('shipstatus'),
               
            ]);
if ($book) {
                return response()->json([
                    'success' => true,
                    'code' => '000',
                    'message' => 'Shipment Status Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => '999',
                    'message' => 'Shipment Status Failed to Update!',
                ], 500);
            }

}
		
	}
	
	public function updateorder(Request $request,$id)
	{
		
		
		 $validator = Validator::make($request->all(), [
            'orderstatus'     => 'required',
			 
            
        ]
            
        );
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	
	
	if(isset($request->doc)){
$doc = time().'.'.$request->doc->getClientOriginalExtension();
  $request->doc->move(public_path('/Order_Docs/orders'), $doc);

	
$book = BookM::whereId($id)->update([
                'orderstatus'     => $request->input('orderstatus'),
                'doc'    =>$doc
            ]);
if ($book) {
                return response()->json([
                    'success' => true,
                    'code' => '000',
                    'message' => 'order Status Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => '999',
                    'message' => 'order Status Failed to Update!',
                ], 500);
            }
	}
	else{
		
		
		
		$book = BookM::whereId($id)->update([
                'orderstatus'     => $request->input('orderstatus'),
               
            ]);
if ($book) {
                return response()->json([
                    'success' => true,
                    'code' => '000',
                    'message' => 'order Status Updated successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => '999',
                    'message' => 'order Status Failed to Update!',
                ], 500);
            }
		
		
		
		
	}
}
		
	}
	
	
	
	
	
	
	
	public function assigndriver(Request $request,$id)
	{
		
		
		 $validator = Validator::make($request->all(), [
            'did'     => 'required',
            
        ]
            
        );
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
$book = BookM::whereId($id)->update([
                'did'     => $request->input('did'),
               
            ]);
if ($book) {
                return response()->json([
                    'success' => true,
                    'code' => '000',
                    'message' => 'Order Assigned to driver successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => '999',
                    'message' => 'Order Failed to Assigned!',
                ], 500);
            }

}
		
	}
	
	
	
	
	
	
	
	
	public function storeorder(Request $request)
    {
		

        //validate data
		if (Auth::check()) {
        $validator = Validator::make($request->all(), [
            'invoice_num'     => 'required',
           // 'attatchment'   => 'required',
			'pickuplocation'   => 'required',
			'droplocation'   => 'required',
			'quantity'   => 'required',
			'weight'   => 'required',
			'adress_dir'   => 'required',
			'requested_delivery_date'   => 'required',
			
			
        ]);
		
if($validator->fails()) {
	
		   return view('book');

} else {
	//$id = Auth::user()->id;
	$doc= $request->input('attatchment');
$book = BookM::create([
                'uid' => Auth::user()->id,
                'order_num'     =>  1,
                'invoice_num'     => $request->input('invoice_num'),
                'attatchment'   => $doc,
				'pickuplocation'     => $request->input('pickuplocation'),
                'droplocation'   => $request->input('droplocation'), 
				'quantity'     => $request->input('quantity'),
                'weight'   => $request->input('weight'),
				 'adress_dir'     => $request->input('adress_dir'),
               // 'content'   => $request->input('content'),
				 'requested_delivery_date'     => $request->input('requested_delivery_date'),
                'requested_delivery_time'   => '00',
				'truck_type'   => $request->input('truck_type'),
				'did'   => '0',
				'orderstatus'   => '0',
				'shipstatus'   =>  '1',
				'price'   =>  '0',
				'd_status'   =>  '2',
				'pay_status'   =>  'unpaid'
            ]);
			 $id = DB::getPdo()->lastInsertId();
			 $on= $id.str_pad(rand(0,9), 3, "0", STR_PAD_LEFT);
			  BookM::where('id', $id)->update(['order_num' => $on ]);
			if($book->orderstatus==1){
				
				$st="New";
			}
			if($book->shipstatus==1){
				
				$sts="Pending";
			}
if ($book) 
{
	 $invoice=$request->invoice_num;
	   $qty=$request->quantity;
	   $weight=$request->weight;
	   $pick=$request->pickuplocation;
	   $drop=$request->droplocation;
	   $d8=$request->requested_delivery_date;
	   $truck=$request->truck_type;
	   $file=$doc;
	   $adr=$request->adress_dir;
	   
     return view('bookf');
                
        }
    }
	
	
	
	
	
	
		}
	
	else
	{
		
		return redirect('login')->with('Failed','login to place order');
		
	}
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 public function storetest(Request $request)
    {
		//if (Auth::check()) {

        //validate data
		
        $validator = Validator::make($request->all(), [
           
			'uid'   => 'required',
			
        ]);
		
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	//$id = Auth::user()->id;
	$dat = [];

	if(isset($request->attatchment)){


		 foreach($request->attatchment as $file)

    {
		
        $name= time().'.'.$file->getClientOriginalExtension();    
        $file->move(public_path('/new_Docs'), $name);      
        $dat[] = $name;  
    }

}
else{
    $dat='new';
}

                 $doc=json_encode($dat);


$book = BookM::create([
                'uid' =>  $request->input('uid'),
               'order_num'=> 1,
              
                'attatchment'   => $doc,
				
				'did'   => '0',
				'orderstatus'   => '0',
				'shipstatus'   =>  '1',
				'price'   =>  '0',
				'd_status'   =>  '0'
            ]);
			 $id = DB::getPdo()->lastInsertId();
			 $on= $id.str_pad(rand(0,9), 3, "0", STR_PAD_LEFT);
			  BookM::where('id', $id)->update(['order_num' => $on ]);

			if($book->orderstatus==0){
				
				$st="New";
			}
			if($book->shipstatus==1){
				
				$sts="Pending";
				
			}
			
			
			$firebaseToken = $request->input('uid');
          
        $SERVER_API_KEY = 'AAAAaOYBKtA:APA91bH-cB_NqLR4ZlklrlbIN8cbbVoT09jETymB466aDOwmcpc4zWQVQA8iBsCKQ7TwJ66RkrUP6y57MiJpgltTebRO6DMsqZs7vXDohVbYMlNboOx2pAvvyDmW2YAFP4mm1LeYdG6t';
  
        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => 'Order Created',
                "body" => 'Your Order is created successfully.!',  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        
if ($book&&$response) {
	
	
	
	
	
	
	
                return response()->json([
                    'success' => true,
                    'code'  => '000',
					'message' => 'Saved Successfully',
					'uid'   => $request->input('uid'),
                    'order_num' => $on,
                    'attatchment'=> $doc,
					
					'did'   => '0',
					'orderstatus'   => $st,
					'shipstatus'   => $sts
					
                ], 200);
				
				
				
				
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Details Failed to Save!',
                    'code'    => '999'
                ], 400);
            }
        }
    }
	
	
	public function teststoreapi(Request $request)
    {
		//if (Auth::check()) {

        //validate data
		
        $validator = Validator::make($request->all(), [
            'invoice_num'     => 'required',
            
			'pickuplocation'   => 'required',
			'droplocation'   => 'required',
			'quantity'   => 'required',
			'weight'   => 'required',
			'adress_dir'   => 'required',
			'requested_delivery_date'   => 'required',
			'requested_delivery_time'   => 'required',
			'uid'   => 'required',
			
        ]);
		
if($validator->fails()) {
return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);
} else {
	//$id = Auth::user()->id;
	
	if(isset($request->attatchment)){
$doc = time().'.'.$request->attatchment->getClientOriginalExtension();
  $request->attatchment->move(public_path('/Order_Docs'), $doc);
}
else{
    $doc='NULL';
}

$book = BookM::create([
                'uid' =>  $request->input('uid'),
               'order_num'=> 1,
                'invoice_num'     => $request->input('invoice_num'),
                'attatchment'   => $doc,
				'pickuplocation'     => $request->input('pickuplocation'),
                'droplocation'   => $request->input('droplocation'), 
				'quantity'     => $request->input('quantity'),
                'weight'   => $request->input('weight'),
				 'adress_dir'     => $request->input('adress_dir'),
               // 'content'   => $request->input('content'),
				 'requested_delivery_date'     => $request->input('requested_delivery_date'),
                'requested_delivery_time'   => $request->input('requested_delivery_time'),
				'truck_type'   => $request->input('truck_type'),
				'did'   => '0',
				'orderstatus'   => '0',
				'shipstatus'   =>  '1',
				'price'   =>  '0',
				'd_status'   =>  '0',
				'pay_status' => 'unpaid'
            ]);
			 $id = DB::getPdo()->lastInsertId();
			 $on= $id.str_pad(rand(0,9), 3, "0", STR_PAD_LEFT);
			  BookM::where('id', $id)->update(['order_num' => $on ]);

			if($book->orderstatus==1){
				
				$st="New";
			}
			if($book->shipstatus==1){
				
				$sts="Pending";
				
			}
			
			
			$firebaseToken = $request->input('uid');
          
        $SERVER_API_KEY = 'AAAAaOYBKtA:APA91bH-cB_NqLR4ZlklrlbIN8cbbVoT09jETymB466aDOwmcpc4zWQVQA8iBsCKQ7TwJ66RkrUP6y57MiJpgltTebRO6DMsqZs7vXDohVbYMlNboOx2pAvvyDmW2YAFP4mm1LeYdG6t';
  
        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => 'Order Created',
                "body" => 'Your Order is created successfully.!',  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        
if ($book&&$response) {
	
	
	
	
	
	
	
                return response()->json([
                    'success' => true,
                    'code'  => '000',
					'message' => 'Saved Successfully',
					'uid'   => $request->input('uid'),
                    'order_num' => $on,
					'invoice_num' => $request->input('invoice_num'),
					'pickuplocation' => $request->input('pickuplocation'),
					'droplocation' => $request->input('droplocation'),
					'quantity' => $request->input('quantity'),
					'weight' => $request->input('weight'),
					'adress_dir' => $request->input('adress_dir'),
					'requested_delivery_date' => $request->input('requested_delivery_date'),
					'requested_delivery_time' => $request->input('requested_delivery_time'),
					'truck_type' => $request->input('truck_type'),
					
					'did'   => '0',
					'orderstatus'   => $st,
					'shipstatus'   => $sts
					
                ], 200);
				
				
				
				
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Details Failed to Save!',
                    'code'    => '999'
                ], 400);
            }
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
   
   

