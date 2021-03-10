<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemConfigsTable extends Migration 
{
	public function up()
	{
		Schema::create('system_configs', function(Blueprint $table) {
            $table->id();
            $table->json('config')->default(null)->comment('系统配置');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('system_configs');
	}
}
