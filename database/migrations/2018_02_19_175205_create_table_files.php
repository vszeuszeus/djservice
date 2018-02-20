<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('version')->default('1.0');
            $table->string('path');
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')->references('id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function(Blueprint $table){
            $table->dropForeign('files_project_id_foreign');
        });
        Schema::dropIfExists('files');
    }
}
