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
        Schema::create('company_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companyid');
            $table->foreign('companyid')->references('id')->on('companies');
            $table->string('policyname');
            $table->enum('policytype', ['Electronics', 'Sports', 'Assessiries','Other']);
            $table->longText('p_desc');
            $table->double('p_price');
            $table->double('c_price');
            $table->integer('policy_period');
            $table->unique(["companyid", "policyname","policy_period","c_price"], 'unique');
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
        Schema::dropIfExists('company_policies');
    }
};
