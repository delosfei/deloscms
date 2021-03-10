<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create(
            'attachments',
            function (Blueprint $table) {
                $table->id();
                $table->string('path')->nullable()->comment('文件路径');
                $table->string('name')->comment('文件名称');
                $table->string('extension')->nullable()->comment('扩展名');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->unsignedInteger('size')->default(0)->comment('文件大小');
                $table->foreignId('site_id')->nullable()->constrained()->onDelete('cascade');
//            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::drop('attachments');
    }
}
