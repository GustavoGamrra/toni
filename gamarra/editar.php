<?php
include('conexao.php');

$id = intval($_GET['id']);

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

    $sql_update = "UPDATE contatos 
    SET nome='$novo_nome', endereco='$novo_endereco', telefone='$novo_fone'
    WHERE id = $id";

    if (mysqli_query($conexao, $sql_update)) {

        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <link rel='stylesheet' href='agenda.css'>
            <title>Sucesso</title>
        </head>
        <body class='body-mensagem'>
            <div class='container-mensagem'>
                <h2>Contato atualizado com sucesso!</h2>
                <a href='index.php' class='btn-voltar'>VOLTAR PARA A AGENDA</a>
            </div>
        </body>
        </html>";
        exit; 
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Edição de Contatos</title>
    <link rel="stylesheet" href="agenda.css">
</head>
<body>
    <h1>Edição de contatos</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>"><br><br>
        Endereço: <input type="text" name="endereco" value="<?php echo $contato['endereco']; ?>"><br><br>
        Telefone: <input type="text" name="fone" value="<?php echo $contato['telefone']; ?>">
        <br><br>
        <input type="submit" name="atualizar" value="Atualizar" class="btn-cadastrar">
    </form>
    <a href='index.php' class='btn-voltar'>VOLTAR PARA A AGENDA</a>
</body>
</html>
