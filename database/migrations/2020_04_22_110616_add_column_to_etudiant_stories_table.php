<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToEtudiantStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etudiant_stories', function (Blueprint $table) {
            $table->string('contact_name')->nullable();
            $table->string('contact_relationship')->nullable();
            $table->string('contact_occupation')->nullable();
            $table->string('contact_adress')->nullable();
            $table->string('contact_tel')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('pere_name')->nullable();
            $table->string('pere_occupation')->nullable();
            $table->string('pere_adress')->nullable();
            $table->string('pere_tel')->nullable();
            $table->string('pere_email')->nullable();
            $table->string('mere_name')->nullable();
            $table->string('mere_occupation')->nullable();
            $table->string('mere_adress')->nullable();
            $table->string('mere_tel')->nullable();
            $table->string('mere_email')->nullable();
            $table->string('education_1_institutition')->nullable();
            $table->string('education_1_option')->nullable();
            $table->string('education_1_degree')->nullable();
            $table->date('education_1_start')->nullable();
            $table->date('education_1_end')->nullable();
            $table->string('education_2_institutition')->nullable();
            $table->string('education_2_option')->nullable();
            $table->string('education_2_degree')->nullable();
            $table->date('education_2_start')->nullable();
            $table->date('education_2_end')->nullable();
            $table->string('education_3_institutition')->nullable();
            $table->string('education_3_option')->nullable();
            $table->string('education_3_degree')->nullable();
            $table->date('education_3_start')->nullable();
            $table->date('education_3_end')->nullable();
            $table->string('work_institutition')->nullable();
            $table->string('work_post')->nullable();
            $table->string('work_categori')->nullable();
            $table->date('work_start')->nullable();
            $table->date('work_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiant_stories', function (Blueprint $table) {
            //
        });
    }
}
