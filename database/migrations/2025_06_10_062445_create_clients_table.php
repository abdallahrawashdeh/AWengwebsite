<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps(); // This will store created_at and updated_at
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
