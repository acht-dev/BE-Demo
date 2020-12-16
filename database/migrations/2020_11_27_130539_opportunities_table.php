<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_name');
            $table->integer('time');
            $table->integer('categorizes_id');
            $table->tinyInteger('status');
            $table->integer('view');
            $table->integer('applying');
            $table->text('job_description');
            $table->integer('position_category_id');
            $table->dateTimeTz('date_open')->nullable();
            $table->dateTimeTz('date_close')->nullable();
            $table->integer('education_id');
            $table->integer('user_id');
            $table->text('other_skills');
            $table->integer('years_experience');
            $table->integer('contract_type_id');
            $table->integer('major_id');
            $table->integer('location_id');
            $table->integer('language_id');
            $table->boolean('remote');
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
