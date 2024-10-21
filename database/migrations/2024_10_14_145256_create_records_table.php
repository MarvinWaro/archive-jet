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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->constrained('years')->onDelete('cascade');
            $table->string('month');
            $table->foreignId('folder_id')->constrained('folders')->onDelete('cascade'); // Corrected this to foreignId for folder_id
            $table->string('folder_type');
            $table->longText('folder_description');
            $table->foreignId('submission_year_id')->constrained('submission_years')->onDelete('cascade');
            $table->string('submission_month');
            $table->string('status');
            $table->string('others');
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Adds deleted_at column
        });
    }


    public function down()
    {
        Schema::dropIfExists('records');
    }
};

