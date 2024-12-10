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
        Schema::table('sunscreens', function (Blueprint $table) {
            $table->unsignedTinyInteger('spf_fk');

            $table->foreign('spf_fk')->references('spf_id')->on('spfs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sunscreens', function (Blueprint $table) {
            $table->dropColumn('spf_fk');
        });
    }
};
