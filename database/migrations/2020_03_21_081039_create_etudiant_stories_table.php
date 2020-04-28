<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_stories', function (Blueprint $table) {
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
        Schema::dropIfExists('etudiant_stories');
    }
}
