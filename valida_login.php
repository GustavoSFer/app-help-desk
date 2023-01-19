<?php

  session_start();
  $_SESSION['autenticado'];

  $usuario_autenticado = false;
  $usuario_id = null;
  $usuario_perfil_id = null;

  $perfirs = array(1 => 'Administrativo', 2 => 'Usuários');

  // Simulando banco de dados
  $usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '4567', 'perfil_id' => 2),
  );

  foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
      $usuario_autenticado = true;
      $usuario_id = $user['id'];
      $usuario_perfil_id = $user['perfil_id'];
    };
  };

  if ($usuario_autenticado) {
    echo 'Usuário autenticado';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
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