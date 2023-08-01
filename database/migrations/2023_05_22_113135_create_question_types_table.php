<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->default(null)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('main_question_type_id')
                ->nullable()
                ->default(null)
                ->constrained('question_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('component');
            $table->string('label', 1023);
            $table->text('description')
                ->nullable()
                ->default(null);
            $table->boolean('required')
                ->nullable()
                ->default(false);
            $table->unsignedSmallInteger('order')
                ->nullable()
                ->default(null);
            $table->text('value')
                ->nullable()
                ->default(null);
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
        Schema::dropIfExists('question_types');
    }
}
