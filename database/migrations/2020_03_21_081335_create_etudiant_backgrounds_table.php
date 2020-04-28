<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_backgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('contact_name');
            $table->string('contact_relationship');
            $table->string('contact_occupation');
            $table->string('contact_adress');
            $table->string('contact_tel');
            $table->string('contact_email');
            $table->string('pere_name');
            $table->string('pere_occupation');
            $table->string('pere_adress');
            $table->string('pere_tel');
            $table->string('pere_email');
            $table->string('mere_name');
            $table->string('mere_occupation');
            $table->string('mere_adress');
            $table->string('mere_tel');
            $table->string('mere_email');
            $table->string('education_1_institutition');
            $table->string('education_1_option');
            $table->string('education_1_degree');
            $table->date('education_1_start');
            $table->date('education_1_end');
            $table->string('education_2_institutition');
            $table->string('education_2_option');
            $table->string('education_2_degree');
            $table->date('education_2_start');
            $table->date('education_2_end');
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
        Schema::dropIfExists('etudiant_backgrounds');
    }
}
