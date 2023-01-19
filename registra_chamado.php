<?php
  // Trabalhando na montagem do texto
  $titulo = str_replace('#', '-', $_POST['titulo']);
  $categoria = str_replace('#', '-', $_POST['categoria']);
  $descricao = str_replace('#', '-', $_POST['descricao']);

  $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
  // PHP_EOL => Gera uma nova linha, assim o proximo é escrito na linha de baixo;

  // Abrindo - escrevendo o texto e fechando o arquivo
  $arquivo = fopen('arquivo.txt', 'a');
  fwrite($arquivo, $texto);
  fclose($arquivo);

  header('Location: abrir_chamado.php');

?>