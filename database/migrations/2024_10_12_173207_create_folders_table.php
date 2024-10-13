<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Folder name
            $table->boolean('activate')->default(1); // Whether the folder is active
            $table->boolean('exclude')->default(0); // Whether the folder is excluded
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('folders');
    }

};
