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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();

            $table->string("pesan");

            $table->unsignedBigInteger('walas_id')->nullable();
            $table->foreign('walas_id')->references('id')->on('walas')->onDelete('cascade');
            
            $table->unsignedBigInteger('bk_id')->nullable();
            $table->foreign('bk_id')->references('id')->on('bks')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
