<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretateTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('comment')->nullable();
            $table->string('github_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('user');
    }
}
