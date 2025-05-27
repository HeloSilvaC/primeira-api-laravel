<?php

header("Content-Type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];

$acao = isset($_GET['acao']) ? $_GET['acao'] : (isset($_POST['acao']) ? $_POST['acao'] : null);

$resposta = [];

if ($metodo == 'GET') {
    if ($acao == 'boasVindas' || $acao === null) {
        header("Access-Control-Allow-Methods: GET");
        http_response_code(200);
        $resposta = [
            "mensagem" => "Bem-vindo à minha primeira API em PHP!"
        ];
    } elseif ($acao == 'listarUsuarios') {
        header("Access-Control-Allow-Methods: GET");
        http_response_code(200);

        $usuarios = [
            ["id" => 1, "nome" => "Alice", "email" => "alice@example.com"],
            ["id" => 2, "nome" => "Bob", "email" => "bob@example.com"],
            ["id" => 3, "nome" => "Carol", "email" => "carol@example.com"]
        ];
        $resposta = $usuarios;
    } else {
        header("Access-Control-Allow-Methods: GET");
        http_response_code(404);
        $resposta = [
            "erro" => "Endpoint não encontrado ou ação inválida."
        ];
    }
} elseif ($metodo == 'POST') {
    $dadosRecebidos = json_decode(file_get_contents('php://input'), true);
    if ($acao == 'criarUsuario') {
        header("Acess-Control-Allow-Methods: POST");

        if (isset($dadosRecebidos['nome']) && isset($dadosRecebidos['email'])) {
            http_response_code(201);
            $novoUsuario = [
                "id" => time(), // ID simples baseado no timestamp
                "nome" => $dadosRecebidos['nome'],
                "email" => $dadosRecebidos['email'],
                "mensagem" => "Usuário criado com sucesso (simulado)!"
            ];
            $resposta = $novoUsuario;
        } else {
            http_response_code(400);
            $resposta = [
                "erro" => "Dados inválidos ou ausentes para criar usuário. 'nome' e 'email' são obrigatórios."
            ];
        }
    } else {
        header("Access-Control-Allow-Methods: POST");
        http_response_code(404);
        $resposta = [
            "erro" => "Endpoint POST não encontrado ou ação inválida."
        ];
    }
} else {
    http_response_code(405); // Method Not Allowed
    $resposta = [
        "erro" => "Método HTTP não permitido."
    ];
    header("Allow: GET, POST");
}

echo json_encode($resposta, JSON_UNESCAPED_UNICODE);

?>