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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string("supplier_name",150);
            $table->string("contact_person",150);
            $table->string("email",150);
            $table->string("mobile",150);
            $table->string("phone",150);
            $table->string("address",200)->nullable();
            $table->enum("type",[0,1]);
            $table->string("country_id",50);
            $table->string('document_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
