<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Illuminate\Database\Schema\Blueprint $table) {
       
            $table->string('short_description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Illuminate\Database\Schema\Blueprint $table) {
       
            $table->dropColumn('short_description');
            
        });
    }
};
