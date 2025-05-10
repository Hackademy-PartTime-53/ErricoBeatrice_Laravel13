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
        Schema::table('ricettas', function (Blueprint $table) {
            $table->string('immagine')->nullable()->after('contenuto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ricettas', function (Blueprint $table) {
            $table->dropColumn('immagine');
        });
    }
};
