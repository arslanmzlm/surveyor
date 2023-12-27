<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('survey_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('patient_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('token')
                ->nullable()
                ->unique();
            $table->timestamp('sent_at')
                ->nullable();
            $table->timestamp('completed_at')
                ->nullable();
            $table->boolean('filled_by_user')
                ->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_items');
    }
};
