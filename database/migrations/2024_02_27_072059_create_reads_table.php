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
        Schema::create('reads', function (Blueprint $table) {
            $table->id();
            $table->string("carrier_name_id",150);
            $table->string("carrier_type_id",50);
            $table->string("pol",150);
            $table->string("pod",150);
            $table->string("container_type_id",150);
            $table->string("price",150);
            $table->string("free_time",150);
            $table->string("transit_time",150);
            $table->string("validitiy_date",150);
            $table->string("notes",150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reads');
    }
};
