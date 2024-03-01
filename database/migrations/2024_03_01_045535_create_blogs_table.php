<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->unsignedInteger('reading_time')->comment('Reading time in minutes');
            $table->text('description');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();   
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
