<?php
include('conexao.php');

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$fone = $_POST['fone'];

$sql = "INSERT INTO contatos (nome, endereco, telefone) 
        VALUES ('$nome', '$endereco', '$fone')";


echo "<link rel='stylesheet' href='agenda.css'>";
echo "<div class='container-mensagem'>"; 

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Cadastro realizado com sucesso!</h2>";
} else {
    echo "<h2>Erro ao salvar contato</h2>";
    echo "<p>" . mysqli_error($conexao) . "</p>";
}

echo "<a href='index.php' class='btn-voltar'>VOLTAR</a>";
echo "</div>";
?>
