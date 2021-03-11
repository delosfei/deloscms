<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPackagesTable extends Migration 
{
	public function up()
	{
		Schema::create('group_packages', function(Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('group_packages');
	}
}
