<?php

include('conexao.php');

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$fone = $_POST['fone'];

$sql = "INSERT INTO contatos (nome, endereco, telefone) 
         VALUES ('$nome', '$endereco', '$fone')";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<a href='index.php'>VOLTAR</a>";
} else {
    echo "<h2>Erro ao salvar o contato!</h2>" . mysqli_error($conexao);
    echo "<a href='index.php'>VOLTAR</a>";
}
