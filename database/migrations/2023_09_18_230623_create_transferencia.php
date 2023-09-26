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
        Schema::create('transferencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRemetente');
            $table->unsignedBigInteger('idDestinatario');
            $table->timestamp('dataTransferencia');
            $table->float('valor', 8,2);
            $table->timestamps();

            $table->foreign('idRemetente')->references('id')->on('carteira');
            $table->foreign('idDestinatario')->references('id')->on('carteira');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferencia');
    }
};
