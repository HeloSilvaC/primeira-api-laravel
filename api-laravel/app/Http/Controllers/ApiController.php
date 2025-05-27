<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Retorna uma mensagem de boas-vindas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function boasVindas(): JsonResponse
    {
        return response()->json([
            'mensagem' => 'Bem-vindo à minha API com Laravel!'
        ], 200);
    }

    /**
     * Retorna uma lista simulada de usuários.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarUsuarios(): JsonResponse
    {
        $usuarios = [
            ["id" => 1, "nome" => "Alice Laravel", "email" => "alice.laravel@example.com"],
            ["id" => 2, "nome" => "Bob Framework", "email" => "bob.framework@example.com"],
            ["id" => 3, "nome" => "Carol Artisan", "email" => "carol.artisan@example.com"]
        ];
        return response()->json($usuarios, 200);
    }

    /**
     * Cria um novo usuário (simulado).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function criarUsuario(Request $request): JsonResponse
    {
    
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erros' => $validator->errors()
            ], 400);
        }

        $dadosValidados = $validator->validated();

        $novoUsuario = [
            'id' => time(),
            'nome' => $dadosValidados['nome'],
            'email' => $dadosValidados['email'],
            'mensagem_status' => 'Usuário criado com sucesso (simulado com Laravel)!'
        ];

        return response()->json($novoUsuario, 201);
    }
}