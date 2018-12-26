<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('f_name', 10);
            $table->string('m_name', 10)->nullable();
            $table->string('l_name', 10);
            $table->string('phone_1', 16);
            $table->string('phone_2', 16)->nullable();
            $table->string('add_1', 20);
            $table->string('add_2', 20)->nullable();
            $table->string('city', 20);
            $table->string('zip', 10);
            $table->string('state', 20);
            $table->string('country', 20);
            $table->string('avtar', 30)->nullable();
            $table->string('avtar_path', 50)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userprofiles');
    }
}
