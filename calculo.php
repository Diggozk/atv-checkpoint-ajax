<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

   // Lê o JSON enviado no corpo da requisição
    $data = json_decode(file_get_contents("php://input"));

    // larguraComodo,
    // comprimentoComodo,
    // larguraPiso,
    // comprimentoPiso,
    // margem

    //calcular a área do comodo
    $areaComodo =  $data->larguraComodo * $data->comprimentoComodo;

    //calcular a ara da peça do piso
    $areaPiso = $data->larguraPiso * $data->comprimentoPiso;

    //dividir o comodo pelo piso para obter a quantidade
    $quantidade = $areaComodo / $areaPiso;

    //calcular a margem extra
    $margem = $quantidade * ($data->margem / 100);

    $total = $quantidade + $margem;

    echo json_encode(["areaComodo" => $areaComodo, 
                      "areaPiso" => $areaPiso, 
                      "quantidade" => $quantidade,
                      "margem" => $margem,
                      "total" => $total]);

    // // Verifica se o JSON contém os valores esperados
    // if (isset($data->numero1) && isset($data->numero2)) {
    //     // Realiza a soma
    //     $soma = $data->numero1 + $data->numero2;
        
    //     // Retorna a resposta em JSON
    //     echo json_encode(["soma" => $soma]);
    // } else {
    //     // Retorna um erro se os valores não foram enviados corretamente
    //     echo json_encode(["erro" => "Valores numero1 e numero2 são necessários."]);
    // }
} else {
    echo json_encode(['erro' => 'Método não suportado. Use o POST']);
}
?>
