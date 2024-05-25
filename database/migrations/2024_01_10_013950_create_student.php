<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('student_name');
            $table->integer('id_class');
            $table->string('academic_counselors');
            $table->string('financial_status');
            $table->decimal('ipk');
            $table->string('trial_status');
            $table->text('request_recruitment');
            $table->char('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('hamlet');
            $table->string('village');
            $table->string('city');
            $table->string('phone_number');
            $table->string('parents_name');
            $table->string('parents_job');
            $table->string('parents_phone');
            $table->string('competence_test1');
            $table->string('competence_test2');
            $table->string('competence_test3');
            $table->string('competence_test4');
            $table->string('high_school');
            $table->string('major_high_school');
            $table->integer('class_year');
            $table->integer('graduation_year');
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
        Schema::dropIfExists('student');
    }
};
