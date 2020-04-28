<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bourses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->enum('categorie',['partielle','complete','non bourse','condition']);
            $table->integer('programme_id');
            $table->string('duree');
            $table->string('date_entree');
            $table->integer('university_id');
            $table->integer('tuition');
            $table->integer('accomodation');
            $table->boolean('stipend');
            $table->boolean('revue');
            $table->text('detail');
            $table->integer('nbre_place');
            $table->integer('frais');
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
        Schema::dropIfExists('bourses');
    }
}
