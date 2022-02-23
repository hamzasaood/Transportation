<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\User;
use App\Item;
use App\Models\Book as BookM;
use Mail;


class AdminController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {
        


    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function myHome()

    {

       $new = DB::table('book')->where('orderstatus','=','0')->count();
    $pending = DB::table('book')->where('orderstatus','=','1')->count();
	$assigned = DB::table('book')->where('did','!=','0')->where('orderstatus','>','1')->where('orderstatus','<','6')->count();
	$comp = DB::table('book')->where('orderstatus','=','6')->count();
	
	$c=BookM::all()->count();
	
	
	 $viewer = BookM::select(DB::raw("COUNT(id) as count"))
	 ->where('orderstatus','<','2')  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("Year(created_at)"))  
        ->get()->toArray();  
    $viewer = array_column($viewer, 'count');  
      
    $click = BookM::select(DB::raw("COUNT(id) as count"))
        ->where('orderstatus','>','1')->where('orderstatus','<','6')->where('did','!=','0')	
        ->orderBy("created_at")  
        ->groupBy(DB::raw("Year(created_at)"))  
        ->get()->toArray();  
    $click = array_column($click, 'count');  
      
   
	
	
	
	
	
	
	
	
	
	
	

        return view('admin.myHome',compact('new','pending','assigned','comp'))
		->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))  
            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));

    }



    /**

     * Show the my users page.

     *

     * @return \Illuminate\Http\Response

     */

    public function product()

    {
		$contact = ContactUs::all();

        return view('admin.product',compact('contact'));
		

    }

  public function unorder()

    {
       // $order = BookM::all();
		
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.did','!=','0')->where('book.orderstatus','>','1')->where('book.orderstatus','<','6')
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.order',compact('order','users'));

    }
	
	
	
	 public function corder()

    {
       // $order = BookM::all();
		
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.did','!=','0')->where('book.orderstatus','=','6')
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.corders',compact('order','users'));

    }
	
	
	
	
	
	
	
	
	
	
	public function asview($bookid)

    {
       // $order = BookM::all();
		 $b = BookM::findOrFail($bookid);
		 if($b)
		 {
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.did','!=','0')
			->where('book.orderstatus','>','1')
			->where('book.id','=',$bookid)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.asview',compact('order','users'));
		 }
    }
	
	
	
	
	
	
	
	public function invoice($bookid)

    {
       // $order = BookM::all();
		 $b = BookM::findOrFail($bookid);
		 if($b)
		 {
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.did','!=','0')
			->where('book.orderstatus','=','6')
			->where('book.id','=',$bookid)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.invoice',compact('order','users'));
		 }
    }
	
	
	
	public function invoice2($bookid)

    {
       // $order = BookM::all();
		 $b = BookM::findOrFail($bookid);
		 if($b)
		 {
		$order = DB::table('book')
            ->leftJoin('users', 'book.did', '=', 'users.id')
			
			->where('book.did','!=','0')
			
			->where('book.id','=',$bookid)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','users.truck_number')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.invoice2',compact('order','users'));
		 }
    }
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	public function addextra($bookid)
{
    
	$b = BookM::findOrFail($bookid);
	
	//$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.editextra',compact('b'));
	
}
	
	
	
	public function updatextra($id,Request $request)
    {
        //validate data
        
$book = BookM::where('id',$request->id)->update([
                'extra_charges'     => $request->extra_charges
                
            ]);
if ($book) {
              $b = BookM::findOrFail($request->id);
		 if($b)
		 {
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.did','!=','0')
			->where('book.orderstatus','=','6')
			->where('book.id','=',$request->id)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype')
            ->get();
			
		$users = User::all()->where('usertype','driver');
			
		
		
        return view('admin.invoice',compact('order','users'));
		 }
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }

}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function asorder()

    {
       // $order = BookM::all();
		
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			->where('book.orderstatus','<','2'
			)->select('book.*','users.*','book.id as bookid')
            ->get();
			
		//$users = User::all()->where('id',$order->uid);
			
		
		
        return view('admin.orders',compact('order'));

    }
	
	public function unview($bookid)

    {
       // $order = BookM::all();
		 $b = BookM::findOrFail($bookid);
		 if($b)
		 {
		$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')->where('book.orderstatus','<','2')
			->where('book.id','=',$bookid)
			->select('book.*','users.*','book.id as bookid','shipstatus')
            ->get();
			
		//$users = User::all()->where('id',$order->uid);
			
		
		
        return view('admin.unview',compact('order'));
		 }
    }
	
	
	
	
	
	
	
	
	  public function user()

    {

       $users = User::all();

        
        return view('admin.user',compact('users'));

    }
	
	
	public function driverview($id)

    {

       $users = User::all()->where('usertype','=','driver')->where('id','=',$id);

        
        return view('admin.driver',compact('users'));

    }
	
	
	
	public function destroyContact($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
if ($contact) {
           return redirect('admin/product')->with('success','Message deleted successfully');
}
	
	
	}
	
	
public function delUs($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
if ($users) {
           return redirect('admin/user')->with('success','User deleted successfully');
}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	public function updateun($bookid,Request $request)
    {
        //validate data
        
$book = BookM::where('id',$request->bookid)->update([
                'shipstatus'     => $request->input('shipstatus'),
                'orderstatus'   => $request->input('orderstatus'),
				'pay_status'   => $request->input('pay'),

				'did'   => $request->input('did'),
            ]);
if ($book) {
               return redirect()->back()->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }

}
	
	
	
	public function editun($id)
{
    
	$orders = BookM::findOrFail($id);
	$order = BookM::all()->where('did','=','$id');
	
	$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.editun',compact('order','users','orders'));
	
}
	
	
	
public function delorder($id)
    {
        $order = BookM::findOrFail($id);
        $order->delete();
if ($order) {
           return redirect('admin/orders')->with('success','User deleted successfully');
}
	
	
	}	
	
	
	public function editpass($id)
{
    
	$users = User::findOrFail($id);
	
	//$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.editpass',compact('users'));
	
}
	
	
	
	public function updatepass($id,Request $request)
    {
        //validate data
        
$user = User::where('id',$request->id)->update([
                'password'     => Hash::make($request->password)
                
            ]);
if ($user) {
               return redirect('admin/user')->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }

}
	
	

	public function editprice($id)
{
    
	$order = BookM::findOrFail($id);
	
	//$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.dstatus',compact('order'));
	
}
	
public function dstatus($bookid,Request $request)
    {
        //validate data
        
$order = BookM::where('id',$request->bookid)->update([
                'd_status'     => '1',
				'orderstatus'  => '2',
				'price'        => $request->price
                
        ]);
if ($order) {
               return redirect('admin/orders')->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }

}












public function payedit(Request $request)
    {
        //validate data
        
$order = BookM::where('id',$request->id)->update([
               
				'pay_status'        => $request->pay
                
        ]);
if ($order) {
               return redirect('admin/completed_orders')->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }

}












public function edituser($id)
{
    
	$users = User::findOrFail($id);
	
	//$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.edituser',compact('users'));
	
}	

public function updateuser(Request $request)
    {
        //validate data
		if($request->t_doc&&$request->civil_doc)
		{
        $t_doc = time().'.'.$request->t_doc->getClientOriginalExtension();
  $request->t_doc->move(public_path('/uploadedimages'), $t_doc);
  
  $doc = time().'.'.$request->civil_doc->getClientOriginalExtension();
  $request->civil_doc->move(public_path('/uploadedimages'), $doc);
   $image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  $users = User::where('id',$request->id)->update([
               
				'is_admin'       => '0',
				'image'        => $image,
				't_doc'        => $t_doc,
				'civil_doc'        => $doc,
				'usertype'        => $request->usertype,
				'firstname'      => $request->firstname,
                'lastname'      => $request->lastname,
				'email'      => $request->email,
				 'password' => Hash::make($request->password)
        ]);
if ($users) {
               return redirect('admin/user')->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }
		}
		else{
			$image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  
$users = User::where('id',$request->id)->update([
               
				'is_admin'       => '0',
				'image'        => $image,
				
				'usertype'        => $request->usertype,
				'firstname'      => $request->firstname,
                'lastname'      => $request->lastname,
				'email'      => $request->email
        ]);
if ($users) {
               return redirect('admin/user')->with('success','updated  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }
			
		}
  

}















public function adduser()
{
    
	

        
        
	return view('admin.adduser');
	
}	

public function storeuser(Request $request)
    {
		
        //validate data
		if($request->t_doc&&$request->civil_doc)
		{
			
        $t_doc = time().'.'.$request->t_doc->getClientOriginalExtension();
  $request->t_doc->move(public_path('/uploadedimages'), $t_doc);
  
  $doc = time().'.'.$request->civil_doc->getClientOriginalExtension();
  $request->civil_doc->move(public_path('/uploadedimages'), $doc);
   $image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  $users = User::Create([
               
				'is_admin'       => '0',
				'image'        => $image,
				't_doc'        => $t_doc,
				'civil_doc'        => $doc,
				'usertype'        => $request->usertype,
				'firstname'      => $request->firstname,
                'lastname'      => $request->lastname,
				'email'      => $request->email,
				'dob' => $request->dob,
				
				 'password' => Hash::make($request->password),
				'phone_number' => $request->no,
			     'truck_number' => $request->truck_number,
                'status'  => 'pending'
				
				
        ]);
if ($users) {
               return redirect('admin/user')->with('success','addedd  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }
		}
		else{
			$image = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/uploadedimages/images'), $image);
  
$users = User::Create([
               
				'is_admin'       => '0',
				'image'        => $image,
				
				'usertype'        => $request->usertype,
				'firstname'      => $request->firstname,
                'lastname'      => $request->lastname,
				'email'      => $request->email,
				'dob' => $request->dob,
				
				 'password' => Hash::make($request->password),
				'phone_number' => $request->no,
				'status'  => 'pending'
			    
        ]);
if ($users) {
               return redirect('admin/user')->with('success','added  successfully');
            } 
			
			else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Failed to Update!',
                ], 500);
            }
			
		}
  

}






















public function createorder()
{
    
	//$users = User::findOrFail($id);
	
	$users = User::all();

	
        
        
	return view('admin.createorder',compact('users'));
	
}	






public function store(Request $request)
    {
		

        //validate data
		
        $validator = Validator::make($request->all(), [
            'invoice_num'     => 'required',
            'attatchment'   => 'required',
			'pickuplocation'   => 'required',
			'droplocation'   => 'required',
			'quantity'   => 'required',
			'weight'   => 'required',
			'adress_dir'   => 'required',
			'requested_delivery_date'   => 'required',
			'requested_delivery_time'   => 'required',
			'did'   => 'required',
			'uid'   => 'required'
			
        ]);
		
if($validator->fails()) {
	return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ],400);

} else {
	//$id = Auth::user()->id;
$doc = time().'.'.$request->attatchment->getClientOriginalExtension();
  $request->attatchment->move(public_path('/Order_Docs'), $doc);

$book = BookM::create([
                'uid' => $request->input('uid'),
                'order_num'     =>  '#' . str_pad(rand(5,15), 8, "0", STR_PAD_LEFT),
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
				'did'   => $request->input('did'),
				'orderstatus'   => '0',
				'shipstatus'   =>  '1',
				'price'   =>  '0',
				'd_status'   =>  '2',
				'pay_status' => 'unpaid'
            ]);
			if($book->orderstatus==1){
				
				$st="New";
			}
			if($book->shipstatus==1){
				
				$sts="Pending";
			}
if ($book) {
	return redirect('admin/order')->with('success','order created  successfully');
                
        }
}}


public function reports_menu(){
	return view('admin.reportsMenu');
}


public function reports_customer(){
	$orders=null;
	$users = User::all()->where('usertype','=','customer');
	return view('admin.reportsCustomer',compact('orders','users'));
}
public function reports_customer_show(Request $request){
	$users = User::all()->where('usertype','=','customer');
	// dd($request);
	if ($request->from_date && $request->to_date && $request->payment && $request->customer) {
	$from=$request->from_date;
	$to = $request->to_date;
	$payment = $request->payment;
	$customer= $request->customer;
            
			$orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)->where('book.pay_status','=',$payment)
			->where('book.uid','=',$customer)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
		
	}
	elseif ($request->from_date && $request->to_date && $request->customer) {
	$from=$request->from_date;
	$to = $request->to_date;
    $customer= $request->customer;
            $orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			->where('book.uid','=',$customer)
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	
	}
	elseif ($request->from_date && $request->to_date && $request->payment) {
	$from=$request->from_date;
	$to = $request->to_date;
    $payment = $request->payment;
            $orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			->where('book.pay_status','=',$payment)
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	
	}
	elseif ($request->from_date && $request->to_date) {
	$from=$request->from_date;
	$to = $request->to_date;
   
            $orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	
	}
	elseif ($request->payment && $request->customer) {

	$payment = $request->payment;
	$customer= $request->customer;
	$orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			->where('book.uid','=',$customer)
			->where('book.pay_status','=',$payment)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	}
	elseif ($request->payment) {

	$payment = $request->payment;
	
	$orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			
			->where('book.pay_status','=',$payment)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	}
	elseif ($request->customer) {

	
	$customer= $request->customer;
	$orders = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')
			->where('book.uid','=',$customer)
			
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();
	
	}
	
	
	else{
		$orders=null;
	}



	return view('admin.reportsCustomer',compact('orders','users'));	
}




//summry reportsCustomer
public function sreportcustomer(){
	$orders=null;
	return view('admin.summrycustomer',compact('orders'));
}
public function sreport(Request $request){
	// dd($request);
	 $users = User::all()->where('usertype','=','customer');
	if ($request->from_date && $request->to_date) {
	$from=$request->from_date;
	$to = $request->to_date;
	
           $users = User::all()->where('usertype','=','customer');
		   
		
		 $orders = DB::table('users')
    ->select('users.id as uid','users.firstname','users.lastname','users.phone_number',  DB::raw('COUNT(book.id) AS book_count'))
    ->join('book', 'users.id', '=', 'book.uid')->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
	->addselect(DB::raw('DATE_FORMAT(book.created_at, "%M-%Y") AS dt'))
    ->groupBy('users.id','users.firstname','users.lastname','users.phone_number',DB::raw('DATE_FORMAT(book.created_at, "%M-%Y")'))
    ->get();
		//$orders=BookM::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->get();
	
		   
	}
else{
	
	$orders=null;
}	



	return view('admin.summrycustomer',compact('orders','users'));	
}




















public function sreportdriver(){
	$orders=null;
	return view('admin.summrydriver',compact('orders'));
}
public function sreportd(Request $request){
	// dd($request);
	$users = User::all()->where('usertype','=','driver');
	if ($request->from_date && $request->to_date) {
		
	$from=$request->from_date;
	$to = $request->to_date;
	
           $users = User::all()->where('usertype','=','driver');
		   
		
		 $orders = DB::table('users')
    ->select('users.id as did','users.firstname','users.lastname','users.phone_number',  DB::raw('COUNT(book.id) AS book_count'))
    ->join('book', 'users.id', '=', 'book.did')->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
	->addselect(DB::raw('DATE_FORMAT(book.created_at, "%M-%Y") AS dt'))
    ->groupBy('users.id','users.firstname','users.lastname','users.phone_number',DB::raw('DATE_FORMAT(book.created_at, "%M-%Y")'))
    ->get();
		//$orders=BookM::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->get();
	
		   
	}   else{
		
		$orders =null;
	}



	return view('admin.summrydriver',compact('orders','users'));	
}




public function reports_driver(){
	$orders=null;
	return view('admin.reportsDriver',compact('orders'));
}

public function reports_driver_show(Request $request){
	if ($request->from_date && $request->to_date && $request->payment) {
	$from=$request->from_date;
	$to = $request->to_date;
	$payment = $request->payment;

$orders = DB::table('book')
            ->leftJoin('users', 'book.did', '=', 'users.id')
			->where('book.pay_status','=',$payment)
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
			->where('book.did','!=','0')
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();		
	}
	elseif ($request->from_date && $request->to_date) {
	$from=$request->from_date;
	$to = $request->to_date;


	$orders = DB::table('book')
            ->leftJoin('users', 'book.did', '=', 'users.id')
			->where('book.did','!=','0')
			->whereDate('book.created_at','>=',$from)->whereDate('book.created_at','<=',$to)
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();	
	}
	elseif ($request->payment) {

	$payment = $request->payment;
	$orders = DB::table('book')
            ->leftJoin('users', 'book.did', '=', 'users.id')
			->where('book.pay_status','=',$payment)
			->where('book.did','!=','0')
			->select('book.*','users.*','book.id as bookid','book.did','users.usertype','book.created_at as dt')
            ->get();	
	}else{
		$orders=null;
	}



	return view('admin.reportsDriver',compact('orders'));	

}





// ============end===========









public function emailinvoice($bookid) {
	 
	 
	 
	 
	  $b = BookM::findOrFail($bookid);
	  $uid=$b->uid;
		  $u = User::findOrFail($uid);
	 
	 
	 
 $name=$u->firstname.''.$u->lastname;
 
	 $e=$u->email;
	 $on=$b->order_num;
	 $in=$b->invoice_num;
	 $pl=$b->pickuplocation;
	 $dl=$b->droplocation;
	 $q=$b->quantity;
	 $w=$b->weight;
	 $t=$b->truck_type;
	 $r=$b->requested_delivery_date;
	 $p=$b->price;
	 
	 
	 $mailBody  = "
	

	 <table style='border:2px solid black; width: auto;
            font: 13px Calibri;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;'   width='100%' cellspacing='0'>
                                    <thead>
									<tr>
									
									<th colspan='2'>
									<div class='text-center'>
									<img    src='http://ntctruck.com/app-assets/assets/img/gallery/logo1-02.png'   alt='...' />
									
									</div>
									
									<h3 style='text-align:center'>The National Transport Company</h3>
									 <h4 style='text-align:right'>Date:date('Y/m/d')</h3>
									</th>
									</tr>
									
                                        <tr>
										
										
                                            <th>Customer Name</th>
											 <td>$name</td>
                                            </tr>
											
											<tr>
											<th>Email</th>
											<td>$e</td>
                                            </tr>
											<tr>
											<th>OrderNumber</th>
											 <td>$on</td>
                                           </tr>
										   <tr>
										   <th>InvoiceNumber</th>
											 <td>$in</td>
											 </tr>
											 
											<tr>
											<th>PickupLocation</th>
											 <td>$pl</td>
											</tr>
											<tr>
											<th>DropLocation</th>
											 <td>$dl</td>
                                           </tr>
										   <tr>
										   <th>Quantity</th>
											
										 <td>$q</td>
											</tr>
											<tr>
											<th>Weight</th>
											  <td>$w</td>
											  </tr>
											 
											<tr>
											<th>TruckType</th>
											<td>$t</td>
											</tr>
											
											
											
												
												<tr>
											<th>Price</th>
												<td>
												$p
												</td>
											</tr>
											<tr>
											<th>Total</th>
												<td>
												$p
												</td>
											</tr>
                                        
                                    </thead>
                                   
                                    <tbody>
                                      
                                       
                                       
                                    
                                       
                                    </tbody>
									<tfoot>
									<tr>
									<td colspan='2'>
									<h4 class='text-center' >
									<br>شركة الناقل الوطني لنقل البضائع<br>
									جليب الشيوخ - مجمع بدر - الدورا - مكتب 3<br>
									Jleeb Al Shuyoukh - Badr Comp. - Floor 1 - Off. 3<br>
									<i class='fa fa-phone'></i> 24336461 <i class='fa fa-phone'></i>66240450 
								<i class='fa fa-envelope'></i> The.NTC.kw@gmail.com
                                     </h4>
									</td>
									</tr>
									</tfoot>
                                </table>
								";
	 
	 
      $data = array($b);
      $to=$u->email;
      
      Mail::html($mailBody ,function($message) use ($to) {
          
          
         $message->to($to, 'Invoice')->subject
            ('Invoice From ntctruck.com');
           
            
       
         
      });
      return redirect()->back()->with('message','sent');
      
   }




public function emailto($bookid)
{
	
    
	$b = BookM::findOrFail($bookid);
	if($b->attatchment){
	//$users = User::all()->where('usertype','=','driver');

        
        
	return view('admin.toemail',compact('b'));
	}
	else{
		
		return redirect()->back()->with('message','no attatchment found');
	}
	
}



public function emailattatchment(Request $request,$bookid) {
	 
	 
	 
	 
	  $b = BookM::findOrFail($bookid);
	
 
	 $e=$request->email;
	 $on= public_path('Order_Docs/'.$b->attatchment);
	 
	 
	 
	 $mailBody  = " <table style='border:2px solid black; width: auto;
            font: 13px Calibri;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;'   width='100%' cellspacing='0'>
                                    <thead>
									<tr>
									
									<th colspan='2'>
									<div class='text-center'>
									<img    src='http://ntctruck.com/app-assets/assets/img/gallery/logo1-02.png'   alt='...' />
									
									</div>
									
									<h3 style='text-align:center'>The National Transport Company</h3>
									 <h4 style='text-align:right'>Date:date('Y/m/d')</h3>
									</th>
									</tr>
									
                                       
                                        
                                    </thead>
                                   
                                    <tbody>
                                      
                                       
                                       
                                    
                                       
                                    </tbody>
									<tfoot>
									<tr>
									<td colspan='2'>
									<h4 class='text-center' >
									<br>شركة الناقل الوطني لنقل البضائع<br>
									جليب الشيوخ - مجمع بدر - الدورا - مكتب 3<br>
									Jleeb Al Shuyoukh - Badr Comp. - Floor 1 - Off. 3<br>
									<i class='fa fa-phone'></i> 24336461 <i class='fa fa-phone'></i>66240450 
								<i class='fa fa-envelope'></i> The.NTC.kw@gmail.com
                                     </h4>
									</td>
									</tr>
									</tfoot>
                                </table>";
	 
	 
      $data = array($b);
      
      
      Mail::html($mailBody ,function($message) use ($e,$on) {
          
          
         $message->to($e, 'Invoice')->subject
            ('Invoice From ntctruck.com');
			 $message->attach($on);
           
            
       
         
      });
      return redirect('admin/completed_orders')->with('success','updated  successfully');
      
   }












//**************************end***************************

}