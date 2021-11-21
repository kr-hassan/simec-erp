<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('updator_id')->nullable();
            $table->foreign('updator_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('index');
            $table->integer('parent_id')->nullable();
            $table->string('title', 191);
            $table->string('url', 191)->nullable();
            $table->integer('status')->default('1')->comment('1 = Active & 0= Inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_managers');
    }
}
