<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<inp, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculadora AJAX</h1>

    <pre>
    <fieldset>
        <legend>Área cômodo</legend>

    <label>Largura (m²)</label>
    <input type="number" name="larguraComodo" id="larguraComodo"/>

    <label>Comprimento (m²)</label>
    <input type="number" name="comprimentoComodo" id="comprimentoComodo"/>
    </fieldset>

    <fieldset>
        <legend>Tamanho Piso/Azuleijo</legend>

    <label>Largura (m²)</label>
    <input type="number" name="larguraPiso" id="larguraPiso"/>

    <label>Comprimento (m²)</label>
    <input type="number" name="comprimentoPiso" id="comprimentoPiso"/>
    </fieldset>

    <label>Margem de erro (%)</label>
    <input type="number" name="margem" id="margem"/>

    <button onclick="calcular();">Calcular com ajax</button>

    <p id="resultado"></p>
    </pre>
    <script>
        function calcular(){
            const larguraComodo = document.getElementById("larguraComodo").value;
            const comprimentoComodo = document.getElementById("comprimentoComodo").value;
            const larguraPiso = document.getElementById("larguraPiso").value;
            const comprimentoPiso = document.getElementById("comprimentoPiso").value;
            const margem = document.getElementById("margem").value;

            const medidas = {
                larguraComodo,
                comprimentoComodo,
                larguraPiso,
                comprimentoPiso,
                margem
            };

            const json = JSON.stringify(medidas);
                       
            fetch('/calculo.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: json
            })
            .then(resposta => resposta.json())
            .then(dados =>{
               
                document.getElementById("resultado").innerHTML = 
                   "areaComodo: " + dados.areaComodo +
                      "areaPiso: " + dados.areaPiso +
                      "quantidade: " + dados.quantidade +
                      "margem: " + dados.margem +
                      "total: " + dados.total;
            })
            .catch(erro =>{
                document.getElementById("resultado").innerHTML = 
                "Erro ao processar";
            });
        }
    </script>
</body>
</html>
