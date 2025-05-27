<?php

header("Content-Type: application/json; charset=utf-8");

header("Access-Control-Allow-Methods: GET");

$resposta = [
    "mensagem" => "Bem-vindo à minha primeira API em PHP!"
];

http_response_code(200);

echo json_encode($resposta, JSON_UNESCAPED_UNICODE);

?>