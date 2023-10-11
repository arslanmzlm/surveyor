<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('question_type_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('label', 1023);
            $table->text('description')
                ->nullable()
                ->default(null);
            $table->boolean('required')
                ->nullable()
                ->default(false);
            $table->unsignedSmallInteger('order');
            $table->text('value')
                ->nullable()
                ->default(null);
            $table->smallInteger('score')
                ->nullable()
                ->default(null);
            $table->foreignId('related_to')
                ->nullable()
                ->default(null)
                ->constrained('questions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->json('values')
                ->nullable()
                ->default(null);
            $table->json('options')
                ->nullable()
                ->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
