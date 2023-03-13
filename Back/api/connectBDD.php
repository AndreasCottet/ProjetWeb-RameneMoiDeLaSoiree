<?php
  header("Access-Control-Allow-Origin: *");

  $login = "acottet001";
  $db_pwd = 'cottetandreasbdd';
  /* Creation de l'objet qui gere la connexion: */
  $connection = new mysqli("localhost", $login, $db_pwd, $login);
?> 