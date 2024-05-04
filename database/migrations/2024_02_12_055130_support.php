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
        Schema::create('active_code', function (Blueprint $table) {
            $table -> id();
            $table -> string('name');
            $table->string('status')->default('pending'); 
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('active_code', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
