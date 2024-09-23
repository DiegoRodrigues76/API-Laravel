<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest; 
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() : JsonResponse
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return response()->json([
            'status' => true,
            'categories' => $categories,
        ], 200);
    }

    public function show(Category $category) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'category' => $category,
        ], 200);
    }

    public function store(CategoryRequest $request) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $category = Category::create([
                'name' => $request->name,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'category' => $category,
                'message' => "Categoria criada com sucesso!",
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Erro ao criar a categoria!",
            ], 400);
        }
    }

    public function update(CategoryRequest $request, Category $category) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $category->update([
                'name' => $request->name,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'category' => $category,
                'message' => "Categoria atualizada com sucesso!",
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Erro ao atualizar a categoria!",
            ], 400);
        }
    }

    public function destroy(Category $category) : JsonResponse
    {
        try {
            $category->delete();

            return response()->json([
                'status' => true,
                'category' => $category,
                'message' => "Categoria excluída com sucesso!",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Erro ao excluir a categoria!",
            ], 400);
        }
    }
}
