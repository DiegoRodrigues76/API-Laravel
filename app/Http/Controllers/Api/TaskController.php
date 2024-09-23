<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index() : JsonResponse
    {
        $tasks = Task::with('category')->orderBy('id', 'DESC')->paginate(10);

        return response()->json([
            'status' =>  true,
            'tasks' => $tasks,
        ], 200);
    }

    public function show(Task $task) : JsonResponse
    {
        return response()->json([
            'status' =>  true,
            'task' => $task->load('category'),
        ], 200);
    }

    public function store(TaskRequest $request) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => "Tarefa criada com sucesso!",
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Erro ao criar a tarefa!",
            ], 400);
        }
    }

    public function update(TaskRequest $request, Task $task) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => "Tarefa atualizada com sucesso!",
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Erro ao atualizar a tarefa!",
            ], 400);
        }
    }

    public function destroy(Task $task) : JsonResponse
    {
        try {
            $task->delete();

            return response()->json([
                'status' => true,
                'task' => $task,
                'message' => "Tarefa excluída com sucesso!",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Erro ao excluir a tarefa!",
            ], 400);
        }
    }
}
