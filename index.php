<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agenda</title>
</head>

<body>
    <div class="container">
        <h1>Controle de Tarefas </h1>
        <form class="row m-5 ms-5 pe-5 ps-5 w-50">
            <div class="col-12">
                <label class="form-label">Nome da tarefa:</label>
                <input name="nome" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Finalizada?</label>
                <select name="finalizada" class="form-control">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>
            <div class="col-12 text-center mt-3">
                <button type="submit" class="w-50 btn btn-success">Salvar</button>
            </div>
    </div>
    </form>
    <?php

    if (isset($_GET["nome"])) {
        $nome = $_GET["nome"];
        $finalizada = $_GET["finalizada"];
    } else {
        $nome = "";
        $finalizada = "";
    }

    //dados de conexão com o banco de dados
    $servidor = "localhost";
    $usuario_db = "root";
    $senha_usuario = "";
    $banco_dados = "agenda";

    //abrir a conexão com o banco de dados
    $conexao = mysqli_connect($servidor, $usuario_db, $senha_usuario, $banco_dados);

    //criar sql
    $sql = "insert into tarefas(nome, finalizada) values('$nome', '$finalizada')"; //colocando o nome das variáveis no values tudo que for digitado nos inputs e salvo irá para a tabela

    //executar o sql no banco de dados
    if ($nome != "") {
        mysqli_query($conexao, $sql);
    }

    //fechar a conexão com o banco de dados
    mysqli_close($conexao);
    ?>

    <?php
    //abrir a conexão com o banco de dados
    $conexao = mysqli_connect($servidor, $usuario_db, $senha_usuario, $banco_dados);

    //criar sql
    $sql = "select * from tarefas";

    //executar o sql no banco de dados
    $todas_tarefas = mysqli_query($conexao, $sql);
    //print_r() serve para debugar o código ou seja mostra a linha é comumente usado para entender um erro

    //laço de repetição para exibir os dados
    while ($umaTarefa = mysqli_fetch_assoc($todas_tarefas)) { //essa linha está criando um array associativo, assoc serve para fazer a associação
        // echo $umaTarefa["id"];
        echo $umaTarefa["nome"] . " - " . $umaTarefa["finalizada"] . "<br/>";
    }

    //fechar a conexão com o banco de dados
    mysqli_close($conexao);

    ?>
</body>

</html>