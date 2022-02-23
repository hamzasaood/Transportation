<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Book as BookM;
use App\Models\User;

class TrackOrder extends Controller
{
    public function index($bookid)
   {  if (Auth::check()) {
	   $uid=auth()->user()->id;
	   	$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')->where('book.uid',$uid)->where('book.id',$bookid)->select('book.*','book.id as bookid','users.firstname','users.lastname')
            ->get();
     return view('track',compact('order'));
   }
   else {
		    
		   return view('auth.login');
	   }
   }
   
    public function orderhistory()
   {
	   if (Auth::check()) {
     $uid=auth()->user()->id;
	   	$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')->where('book.uid',$uid)->select('book.*','book.id as bookid','users.firstname','users.lastname')
            ->get();
     return view('orderhistory',compact('order'));
	   }
	   else {
		    
		   return view('auth.login');
	   }
	   
	   
   }
   
    public function orderh($bookid)
   {
	    if (Auth::check()) {
			$uid=auth()->user()->id;
	   	$order = DB::table('book')
            ->leftJoin('users', 'book.uid', '=', 'users.id')->where('book.uid',$uid)->where('book.id',$bookid)->select('book.*','book.id as bookid','users.firstname','users.lastname')
            ->get();
			
			$orderh = BookM::all();
     return view('orderh',compact('order','orderh'));
     
	 
		}
		  else {
		  
		   return view('auth.login');
	   }
	   
		
   }
   
   
}
