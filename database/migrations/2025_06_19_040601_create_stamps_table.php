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
        Schema::create('stamps', function (Blueprint $table) {
            $table->id();
            $table->string('stamp_id')->unique();
            $table->string('visitor_id');
            $table->string('developer_id');
            $table->string('developer_stamp');
            $table->timestamps();

            //FK
            $table->index('visitor_id');
            $table->index('developer_id');
            $table->foreign('visitor_id')->references('visitor_id')->on('visitors')->onDelete('cascade');
            $table->foreign('developer_id')->references('developer_id')->on('developers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stamps');
    }
};
