<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->string('name', 128)->nullable();
            $table->integer('ins_id')->nullable();
            $table->integer('upd_id');
            $table->char('del_flag', 1)->default(0)->comment("0: Active, 1: Deleted");
            $table->foreign('group_id')->references('id')->on('m_groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_teams');
    }
}