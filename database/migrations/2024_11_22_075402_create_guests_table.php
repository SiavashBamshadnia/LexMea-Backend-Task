<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('guests', function (Blueprint $table) {
			$table->id();
			$table->string('full_name');
			$table->unsignedSmallInteger('age');
			$table->foreignId('room_id')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('guests');
	}
};
