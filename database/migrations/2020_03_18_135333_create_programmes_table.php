<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name')->unique();
            $table->string('duration');
            $table->enum('degree',['formation','bts','licence','master','doctorat'])->default('formation');
            $table->enum('language',['anglais','chinois'])->default('anglais');
            $table->enum('domaine',['ingenierie','science','medicine','business','langue et culture','agriculture','art','education','loi'])->default('langue et culture');
            $table->text('details');
            $table->string('requirement');
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
        Schema::dropIfExists('programmes');
    }
}
