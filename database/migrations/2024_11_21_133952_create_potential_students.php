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
        Schema::create('potential_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->year('birth_year');
            $table->string('status');
            $table->longText('comment')->nullable();
            $table->string('parent_name');
            $table->string('parent_surname');
            $table->integer('parent_phone_number');
            $table->string('parent_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potential_students');
    }
};
