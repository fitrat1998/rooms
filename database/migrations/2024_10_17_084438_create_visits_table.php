<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('position');
            $table->string('reason');
            $table->string('tarif');
            $table->string('visa');
            $table->string('visa_period');
            $table->string('registration');
            $table->string('registration_period');
            $table->integer('bed_id');
            $table->integer('comment');
            $table->text('arrive');
            $table->text('leave');
            $table->string('status');
            $table->timestamps();

            $table->foreign('guest_id')
                ->references('id')
                ->on('guests')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
