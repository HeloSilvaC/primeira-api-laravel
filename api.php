<?php

header("Content-Type: application/json; charset=UTF-8");

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'boasVindas';

$resposta = [];

if ($acao == 'boasVindas') {
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

echo json_encode($resposta, JSON_UNESCAPED_UNICODE);

?>