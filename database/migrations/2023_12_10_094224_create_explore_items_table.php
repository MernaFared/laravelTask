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
        Schema::create('explore_items', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title',100);
            $table->float('rating');
            $table->string('price');
            $table->text('description',100);
            $table->boolean('is_featured');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_items');
    }
};
