<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('roles')){
            Schema::create('roles', function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->string('description');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('role_user')){
            Schema::create('role_user', function(Blueprint $table){
                $table->increments('id');
                $table->integer('role_id')->unsigned()->index()->nullable();
                $table->integer('user_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('role_user')){
            Schema::table('role_user', function(Blueprint $table){
                $table->dropForeign('role_user_role_id_foreign');
                $table->dropForeign('role_user_user_id_foreign');
            });
        }
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_user');
    }
}
