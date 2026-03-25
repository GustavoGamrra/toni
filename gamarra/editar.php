<?php
include('conexao.php');

$id = $_GET['id'];

$sql = "SELECT * FROM contatos WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $contato = mysqli_fetch_assoc($resultado);
} else {
    echo "Contato não encontrado.";
    exit;
}

if (isset($_POST['atualizar'])) {

    $novo_nome = $_POST['nome'];
    $novo_endereco = $_POST['endereco'];
    $novo_fone = $_POST['fone'];

    $sql2 = "UPDATE contatos SET nome='$novo_nome', endereco='$novo_endereco', 
    telefone='$novo_fone' WHERE id = $id";

    if (mysqli_query($conexao, $sql2)) {
        echo "<h2>Contato foi atualizado com sucesso!</h2>";
        echo "<a href='index.php'>VOLTAR</a>";
        exit;
    } else {
        echo "<h2>Erro ao atulizar contato. " . mysqli_error($conexao);
        echo "<a href='index.php'>VOLTAR</a>";
        exit;
    }
}




?>

<h1>Edição de contatos</h1>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>"><br><br>
    Endereço: <input type="text" name="endereco" value="<?php echo $contato['endereco']; ?>"><br><br>
    Telefone: <input type="text" name="fone" value="<?php echo $contato['telefone']; ?>">
    <br><br>
    
    <input type="submit" name="atualizar" value="Atualizar">
    
    <link rel="stylesheet" href="agenda.css">
  

</form>

<?php

if (mysqli_query($conexao, $sql2)) {
    echo "<div class='container'>";
    echo "<h2>Contato atualizado com sucesso!</h2>";
    echo "<a href='index.php' class='btn-voltar'>Voltar para a Agenda</a>";
    echo "</div>";
    exit; 
}

?>

