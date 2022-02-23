<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book as BookM;

class Book extends Model
{
    use HasFactory;
	
	protected $table = 'book';
	protected $fillable = [
	     'uid',
		 'did',
	    'order_num',
		'invoice_num',
	    
        'attatchment',
		'pickuplocation',
		'droplocation',
		'quantity',
		'weight',
		'adress_dir',
		'requested_delivery_date',
		'requested_delivery_time',
		'truck_type',
		'orderstatus',
		'shipstatus',
		'price',
		'd_status',
		'doc',
		'pay_status',
		'extra_charges',
    ];
	
	
	/*public function setUserIdAttribute($value)
    {
        $this->attributes['uid'] = Auth::id();
    }*/
	
	
	
	
}
