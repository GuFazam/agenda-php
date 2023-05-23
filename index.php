<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Controle de Tarefas </h1>
    <form>
        nome da tarefa:
        <input name="nome">
        finalizada?:
        <input name="finalizada">
        <button type="submit">Salvar</button>
    </form>
        <?php
        $nome = $_GET["nome"];
        $finalizada = $_GET["finalizada"];
        echo $nome . " - " . $finalizada; //ponto concatena

        //dados de conexão com o banco de dados
        $servidor = "localhost";
        $usuario_db = "root";
        $senha_usuario = "";
        $banco_dados = "agenda";

        //abrir a conexão com o banco de dados
        $conexao = mysqli_connect($servidor,$usuario_db,$senha_usuario,$banco_dados);

        //criar sql
        $sql = "insert into tarefas(nome, finalizada) values('$nome', '$finalizada')"; //colocando o nome das variáveis no values tudo que for digitado nos inputs e salvo irá para a tabela

        //executar o sql no banco de dados
        mysqli_query($conexao, $sql);

        //fechar a conexão com o banco de dados
        mysqli_close($conexao);
        ?>
</body>
</html>