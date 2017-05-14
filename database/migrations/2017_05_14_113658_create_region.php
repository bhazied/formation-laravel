<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('regions')) {
            Schema::create('regions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->integer('state_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
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
        if(Schema::hasTable('regions')){
            Schema::table('regions', function(Blueprint $table){
                $table->dropForeign('regions_state_id_foreign');
            });
        }
        Schema::dropIfExists('regions');
    }
}
