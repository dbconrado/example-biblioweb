<?php

/*
 * Este script mostra os detalhes de um livro.
 *
 * INSTRUÇÕES:
 *
 * envie o seguinte dado via GET:
 *
 * id - o id do livro
 * */

/* PRIMEIRO PASSO: recever o id do livro */

// vou guardar os erros que encontrar em um vetor específico.
// Assim, ao terminar o script, se houver erros no vetor,
// eu os exibo na página.

$erros = array();
$sucesso = false;

// variáveis que guardarão os detalhes do livro
$id = 0;
$titulo = null;

if (empty($_GET['id'])) {
   $erros[] = 'Nenhum id foi passado';

} else {

   $id = $_GET['id'];

   /* SEGUNDO PASSO: montar a sql */
   $sql = "SELECT id, titulo FROM Livro WHERE id=${id}";

   /* TERCEIRO PASSO: conectar-se ao banco, executar a SQL e obter os dados do livro */
   $conexao = mysqli_connect("localhost", "root", "root", "BiblioWeb");

   if (!$conexao) {
      $erros[] = 'Não consegui conectar ao banco de dados';
   
   } else {

      $resultados = mysqli_query($conexao, $sql);
      
      if (mysqli_num_rows($resultados) == 0) {
         $erros[] = "Não há livro com o id ${id}";

      } else {

         $linha = mysqli_fetch_assoc($resultados); // só estou esperando 1 resultado.
         $titulo = $linha['titulo'];
         
         $sucesso = true;
      }

      /* QUARTO E ÚLTIMO PASSO: fechar a conexão */
      mysqli_close($conexao);

   }
}

// Agora, escrevo o HTML da página e uso a construção <?= para colocar os dados obtidos na página
?>
<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <title>BiblioWeb - Consulta de Livro</title>
   </head>
   <body>
      <h1>BiblioWeb</h1>

      <?php

      if ($sucesso) {

      ?>

      <h2><?= $id ?>: <?= $titulo ?></h2>
      <p>Ainda não temos outros dados cadastrados.</p>
      

      <?php

      } else {

      ?>
      
      <p>Ocorreram os seguintes erros:</p>
      <ul>

      <?php

         for ($i = 0; $i < count($erros); $i++) {
            $erro = $erros[$i];

      ?>
         
         <li><?= $erro ?></li>

      <?php

         } // fim do for

      ?>
      
      </ul>

      <?php

      } // fim do if

      ?>
      
   </body>
</html>
