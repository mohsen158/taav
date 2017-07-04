<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberStepTable extends Migration {

	public function up()
	{
		Schema::create('member_step', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('member_id')->unsigned();
			$table->integer('step_id')->unsigned();
			$table->time('arrivalTime')->nullable();
			$table->time('startTime')->nullable();
			$table->time('endTime')->nullable();
			$table->string('status')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('member_step');
	}
}