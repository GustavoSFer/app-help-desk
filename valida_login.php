<?php

  session_start();
  $_SESSION['autenticado'];

  $usuario_autenticado = false;

  // Simulando banco de dados
  $usuarios_app = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
  );

  foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
      $usuario_autenticado = true;
    };
  };

  if ($usuario_autenticado) {
    echo 'Usuário autenticado';
    $_SESSION['autenticado'] = 'SIM';
  } else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
  };

  // Pegando as informações pela super global GET e o nome é pelo name que foi informado la no HTML e são enviados como paramentros; 
  // Esta forma de recebimento é para o metodo GET
  /*
  $_GET['email'];
  $_GET['senha'];
  */

  // Neste caso vamos enviar os dados com o Metodo POST
  /*
  $_POST['email'];
  $_POST['senha'];
  */

?>