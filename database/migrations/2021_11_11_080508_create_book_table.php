<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
			//$table->integer('user_id');
			$table->text('order_num');
		    $table->text('invoice_num');
			$table->text('attatchment');
		
			$table->longtext('pickuplocation');		
			$table->longtext('droplocation');

            $table->double('quantity');
            $table->double('weight');
			$table->string('adress_dir');
            $table->text('requested_delivery_date');
			$table->text('requested_delivery_time');
			$table->text('truck_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
