<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });

        Schema::create('permission_roll', function (Blueprint $table) {
          $table->integer('permission_id')->unsigned()->index();
          $table->integer('roll_id')->unsigned()->index();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('roll_id')->references('id')->on('rolls')->onDelete('cascade')->onUpdatate('cascade');

         $table->primary(['permission_id','roll_id']);            

        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
        Schema::drop('permission_roll');
    }
}
