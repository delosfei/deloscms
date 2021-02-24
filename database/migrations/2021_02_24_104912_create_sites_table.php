<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration 
{
	public function up()
	{
		Schema::create('sites', function(Blueprint $table) {
            $table->id();
            $table->char('title', 30)->nullable()->unique()->comment('站点名称');
            $table->char('domain', 50)->nullable()->unique()->comment('域名');
            $table->json('config')->nullable()->comment('站点配置');
            $table->foreignId('user_id')->default(1)->constrained()->onDelete('cascade')->comment('站长');
            $table->string('keyword', 100)->nullable()->comment('关键字');
            $table->string('description', 100)->nullable()->comment('站点描述');
            $table->string('logo')->nullable()->comment('LOGO');
            $table->string('icp', 100)->nullable()->comment('ICP');
            $table->string('tel', 30)->nullable()->comment('电话');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('counter')->nullable()->comment('统计代码');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('sites');
	}
}
