<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unique_id', 100)->nullable();
            $table->string('nick_name')->nullable();
            $table->string('department');
            $table->string('exam_session')->nullable();
            $table->string('graduation_year');
            $table->string('attachment');
            $table->string('room_no')->nullable();
            $table->string('hall_duration')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender');
            $table->text('present_address');
            $table->text('hobby')->nullable();
            $table->text('postcode');
            $table->text('mobile_1');
            $table->text('mobile_2')->nullable();
            $table->string('email');
            $table->text('occupation');
            $table->text('position');
            $table->text('organization')->nullable();
            $table->string('image')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('alumni_data');
    }
}