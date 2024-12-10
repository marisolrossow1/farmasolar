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
        Schema::create('spfs', function (Blueprint $table) {
            $table->tinyIncrements('spf_id');

            $table->integer('value');

            $table->text('description');

            $table->text('recommended_usage');

            $table->integer('protection_hours');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spfs');
    }
};
