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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("comapny_name");
            $table->string("contact_person");
            $table->string("email");
            $table->string("telephone");
            $table->string("mobile");
            $table->string("notes");
            $table->string("coming_from");
            $table->foreignId("user_id")->constrained("users")->OnDelete('cascade');
            $table->enum("status",[0,1]);
            $table->string("activity",150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
