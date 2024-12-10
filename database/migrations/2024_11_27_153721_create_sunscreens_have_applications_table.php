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
        Schema::create('sunscreens_have_applications', function (Blueprint $table) {
            $table->foreignId('sunscreen_fk')->constrained(table:'sunscreens', column:'sunscreen_id');
        
            $table->unsignedSmallInteger('application_fk');

            $table->foreign('application_fk')->references('application_id')->on('applications');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sunscreens_have_applications');
    }
};
