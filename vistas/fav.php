<?php
session_start();
  require_once "./../models/favorito.php";

  $user = new favorito();

  $user->cambiarFav($_SESSION['usuario']['ID'], $_GET['id']);

  echo '<script type="text/javascript">history.back()</script>';

  