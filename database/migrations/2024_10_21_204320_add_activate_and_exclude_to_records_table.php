<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivateAndExcludeToRecordsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->boolean('activate')->default(1); // Default is active
            $table->boolean('exclude')->default(0); // Default is not excluded
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn(['activate', 'exclude']); // Remove columns on rollback
        });
    }
}
