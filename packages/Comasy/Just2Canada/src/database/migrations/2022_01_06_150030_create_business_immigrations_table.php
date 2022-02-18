<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessImmigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_immigrations', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('nationality');
            $table->string('reference');
            $table->string('currently_in_canada');
            $table->string('experience');
            $table->json('aoi')->nullable();
            $table->text('describe');
            $table->unsignedInteger('qualification');
            $table->date('dob');
            $table->string('marital_status');
            $table->date('spouse_dob')->nullable();
            $table->integer('spouse_experience')->nullable();
            $table->unsignedInteger('no_of_children')->nullable();
            $table->string('has_children_lt_22')->nullable();
            $table->string('children_enrolled')->nullable();
            $table->string('children_canadian')->nullable();
            $table->string('children_mental')->nullable();
            $table->string('ordered_to_leave');
            $table->string('arrested');
            $table->string('been_military');
            $table->string('employed_security');
            $table->string('visited');
            $table->json('visited_countries')->nullable();
            $table->string('has_blood_relative');
            $table->json('relative_province')->nullable();
            $table->string('visited_canada');
            $table->string('visited_in_2')->nullable();
            $table->json('visited_province')->nullable();
            $table->string('refused');
            $table->string('refused_detail')->nullable();
            $table->unsignedInteger('assets');
            $table->string('language_test');
            $table->integer('read_score')->nullable();
            $table->integer('write_score')->nullable();
            $table->integer('speak_score')->nullable();
            $table->integer('listen_score')->nullable();
            $table->unsignedInteger('language_proficiency')->nullable();
            $table->text('comments')->nullable();
            $table->json('interested_programs');
            $table->string('prefered_location');
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
        Schema::dropIfExists('business_immigrations');
    }
}
