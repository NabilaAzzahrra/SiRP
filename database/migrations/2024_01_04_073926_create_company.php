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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('code_company');
            $table->string('company_name');
            $table->string('sector');
            $table->string('company_type');
            $table->text('address');
            $table->string('city');
            $table->string('email');
            $table->string('fax');
            $table->string('kode_pos');
            $table->string('grade');
            $table->char('pic');
            $table->string('position');
            $table->string('phone_number');
            $table->string('mou');
            $table->string('relation');
            $table->string('account_active');
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
        Schema::dropIfExists('company');
    }
};
