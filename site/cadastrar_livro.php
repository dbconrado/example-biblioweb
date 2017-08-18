<?php

/* este script cadastra um livro no banco de dados.
 *
 * INSTRUÇÕES:
 *
 * envie os seguintes dados via POST:
 *
 * titulo - o título do livro a ser cadastrado
 *
 * */

/* PRIMEIRO PASSO: receber os dados */
if (empty($_POST['titulo'])) {
   die("Uso incorreto deste script.");
}

$titulo = $_POST['titulo'];

/* SEGUNDO PASSO: montar o comando SQL */

$sql = "INSERT INTO Livro (titulo) VALUES ('${titulo}')";

/* TERCEIRO PASSO: conectar-se ao banco de dados */

$conexao = mysqli_connect("localhost", "root", "root", "BiblioWeb");
if (!$conexao) {
   die("Não consegui me conectar ao banco. Mensagem de erro: " . mysqli_connect_error());
}

/* QUARTO PASSO: executar o comando SQL */

$sucesso = mysqli_query($conexao, $sql);
if (!$sucesso) {
   echo "Não consegui realizar o cadastro.";
} else {
   echo "Cadastrado com sucesso!";
}

$id_gerado = mysqli_insert_id($conexao);

/* QUINTO PASSO: fechar a conexão */
mysqli_close($conexao);

/* Aplicando a técnica POST/Redirect/GET */
$redirecionar = "/biblioweb/livro.php?id=${id_gerado}";

header("Location: ${redirecionar}");

?>
