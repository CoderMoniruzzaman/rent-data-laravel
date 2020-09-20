<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddtenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addtenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('division_id');
            $table->string('thana');
            $table->integer('product_id');
            $table->integer('addhouse_id');
            $table->string('flatno');

            $table->string('tenantname');
            $table->string('fname');
            $table->timestamp('dob')->nullable();
            $table->integer('mstatus');
            $table->longText('permanentaddr');

            $table->longText('jobaddr');
            $table->string('religion');
            $table->string('education');
            $table->string('mbno');
            $table->string('emailid')->nullable();
            $table->string('passportno')->nullable();
            $table->string('nid');
            $table->string('impcontact')->nullable();
            $table->string('relation')->nullable();
            $table->longText('impaddr')->nullable();
            $table->string('impmbno')->nullable();

            $table->string('fmembername_one')->nullable();
            $table->string('fmemberage_one')->nullable();
            $table->string('fmemberjob_one')->nullable();
            $table->string('fmembermbno_one')->nullable();

            $table->string('fmembername_two')->nullable();
            $table->string('fmemberage_two')->nullable();
            $table->string('fmemberjob_two')->nullable();
            $table->string('fmembermbno_two')->nullable();

            $table->string('fmembername_three')->nullable();
            $table->string('fmemberage_three')->nullable();
            $table->string('fmemberjob_three')->nullable();
            $table->string('fmembermbno_three')->nullable();

            $table->string('maidname')->nullable();
            $table->string('maidnid')->nullable();
            $table->string('maidmbno')->nullable();
            $table->longText('maidpaddr')->nullable();

            $table->string('drname')->nullable();
            $table->string('drnid')->nullable();
            $table->string('drmbno')->nullable();
            $table->longText('drpaddr')->nullable();

            $table->string('prellname')->nullable();
            $table->string('prellmbno')->nullable();
            $table->longText('prelladdr')->nullable();

            $table->string('leavereason')->nullable();
            $table->string('newllname')->nullable();
            $table->string('newllmbno')->nullable();

            $table->timestamp('newdate')->nullable();
            $table->timestamp('datebottom')->nullable();
            $table->string('signature')->default('defaultsig.jpg');
            $table->string('photograph')->default('defaultphoto.jpg');

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
        Schema::dropIfExists('addtenants');
    }
}
