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
            $table->foreignId('year_id')->constrained('years')->onDelete('cascade'); // Foreign key to years table
            $table->string('month'); // Month as a string or int (e.g., 'January', '02')
            $table->foreignId('folder_id')->constrained('folders')->onDelete('cascade'); // Foreign key to folders table
            $table->string('folder_type'); // Folder type (e.g., ACIC, MDS)
            $table->text('folder_description'); // Folder description
            $table->foreignId('submission_year_id')->constrained('submission_years')->onDelete('cascade'); // Foreign key to submission_years table
            $table->string('submission_month'); // Submission month
            $table->enum('status', ['completed', 'in-progress']); // Record status
            $table->string('others')->nullable(); // Optional field for other details
            $table->text('remarks')->nullable(); // Remarks or comments
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
};

