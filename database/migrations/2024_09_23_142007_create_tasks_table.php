<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título da tarefa
            $table->text('description'); // Descrição da tarefa
            $table->enum('status', ['pending', 'completed']); // Status da tarefa
            $table->foreignId('category_id')->constrained('categories'); // Chave estrangeira para categorias
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
