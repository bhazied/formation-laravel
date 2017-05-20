<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnonces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('annonces')){
            Schema::create('annonces', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('reference')->unique()->index();
                $table->longText('description');
                $table->boolean('is_valid')->default(false);
                $table->boolean('is_active')->default(true);
                $table->integer('category_id')->unsigned()->index()->nullable();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
                $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('modifier_user_id')->references('id')->on('users')->onDelete('set null');
                $table->timestamps();
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
        if(Schema::hasTable('annonces')){
            Schema::table('annonces', function(Blueprint $table){
                $table->dropForeign('annonces_category_id_foreign');
                $table->dropForeign('annonces_creator_user_id_foreign');
                $table->dropForeign('annonces_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('annonces');
    }
}
