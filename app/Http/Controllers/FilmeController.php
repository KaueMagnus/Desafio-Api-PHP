<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmeController extends Controller
{
    public function exibir()
    {
        $filmes = Filme::all();
        return response()->json([
            'status' => true,
            'message' => 'Filmes encontrados com sucesso',
            'data' => $filmes
        ], 200);
    }

    public function exibirPeloId($id)
    {
        $filme = Filme::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Filme encontrado com sucesso',
            'data' => $filme
        ], 200);
    }

    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'anoLancamento' => 'required|numeric',
            'diretor' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $filme = Filme::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Filme criado com sucesso',
            'data' => $filme
        ], 201);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'anoLancamento' => 'required|numeric',
            'diretor' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $filme = Filme::findOrFail($id);
        $filme->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Filme editado com sucesso',
            'data' => $filme
        ], 200);
    }

    public function deletar($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Filme deletado com sucesso'
        ], 204);
    }
}
