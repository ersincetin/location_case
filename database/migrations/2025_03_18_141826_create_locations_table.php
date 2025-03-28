<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name',256);
            $table->decimal('latitude', 17, 14);
            $table->decimal('longitude', 17, 14);
            $table->string('marker_color',8);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
