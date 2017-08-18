<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BiblioWeb - Pesquisa no Acervo - Resultados</title>
	</head>
	<body>
		<h1>BiblioWeb</h1>
		<h2>Pesquisa no acervo</h2>

		<?php

		/* monto meu comando SQL utilizando termpo de pesquisa passado via GET */
		$termo_pesquisa = $_GET['pesquisa'];

		$sql = "SELECT id, titulo FROM Livro WHERE titulo LIKE '%" . $termo_pesquisa . "%'";

		$conexao = mysqli_connect("localhost","root","root","BiblioWeb");

		if (!$conexao)
			die("Conexão falhou. Mensagem de erro: " . mysqli_connect_error());

		$resultado = mysqli_query($conexao, $sql);

		$total = mysqli_num_rows($resultado);
		print "O termo <q>${termo_pesquisa}</q> retornou ${total} resultados:"; // Consegue dizer o que essa linha faz?

		?>
		
		<ul>
		
		<?php

		while ($linha = mysqli_fetch_assoc($resultado))
		{
			$titulo = $linha['titulo'];
			$id = $linha['id'];

		?>

			<li><?= $titulo ?> (id: <?= $id ?>)</li>

		<?php

		} // fim do while

		?>

		</ul>
		
		<?php

		mysqli_close($conexao);

		?>

	</body>
</html>
