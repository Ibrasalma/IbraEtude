<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bourse_id');
            $table->string('family_name');
            $table->string('given_name');
            $table->string('passport_number')->unique();
            $table->date('passport_expire');
            $table->string('nationality');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->enum('gender',['M','F']);
            $table->enum('marital_status',['marriee','celibataire','divorce','veuf']);
            $table->string('occupation');
            $table->string('relligion');
            $table->string('mobile');
            $table->boolean('is_in_China');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->integer('code_postal');
            $table->string('affiliated');
            $table->string('hobbies');
            $table->enum('highest_degree',['highSchool','bachelor','diploma','master']);
            $table->boolean('studied_china');
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
        Schema::dropIfExists('etudiants');
    }
}
