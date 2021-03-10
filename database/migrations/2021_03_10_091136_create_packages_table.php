<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration 
{
	public function up()
	{
		Schema::create('packages', function(Blueprint $table) {
            $table->id();
            $table->char('title', 50)->unique()->comment('套餐名称');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('packages');
	}
}
