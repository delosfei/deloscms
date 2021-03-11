<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration 
{
	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
            $table->id();
            $table->char('title', 50)->unique()->comment('会员组名称');
            $table->unsignedTinyInteger('site_num')->default(1)->comment('站点数量');
            $table->unsignedSmallInteger('days')->default(60)->comment('可用天数');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('groups');
	}
}
