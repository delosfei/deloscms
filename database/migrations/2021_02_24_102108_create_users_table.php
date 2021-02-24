<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration 
{
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable()->comment('昵称');
            $table->string('email', 50)->nullable()->unique()->comment('邮箱');
            $table->string('mobile', 20)->nullable()->unique()->comment('手机号');
            $table->string('real_name', 20)->nullable()->comment('真实姓名');
            $table->string('password')->nullable()->unique()->comment('密码');
            $table->string('home')->nullable()->comment('网站');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('wechat')->nullable()->unique()->comment('微信号');
            $table->string('qq', 10)->nullable()->unique()->comment('QQ号');
            $table->bigInteger('group_id')->default(1)->comment('默认系统会员组');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('mobile_verified_at')->nullable()->comment('手机验证时间');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->string('remember_token', 100)->nullable()->comment('记住我');
            $table->unsignedTinyInteger('lock')->nullable()->comment('用户锁定');
            $table->unsignedInteger('ren')->nullable()->comment('仁');
            $table->unsignedInteger('yi')->nullable()->comment('义');
            $table->unsignedInteger('li')->nullable()->comment('礼');
            $table->unsignedInteger('zhi')->nullable()->comment('智');
            $table->unsignedInteger('xin')->nullable()->comment('综合得分')->unsignedInteger();
            $table->unsignedTinyInteger('is_super_admin')->nullable()->index()->comment('超级管理员');
            $table->foreignId('current_team_id')->nullable()->comment('当前队id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('users');
	}
}
