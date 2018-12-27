<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenderidManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senderid_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('senderid');
            $table->integer('user_id');
            $table->enum('status',['requested','approved','disapproved']);
            $table->integer('operator_id');
            $table->string('descriptions');
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
        Schema::dropIfExists('senderid_managements');
    }
}
