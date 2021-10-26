<?php

  // Obtengo el valor de cookie
  if (isset($_COOKIE["fruta"])) {
    $valorfruta = $_COOKIE["fruta"];
  }

  // Cambio el valor del cookie
  if (isset($_POST["cambiar"])) {
    $valorfruta = $_POST["fruta"];
    setcookie("fruta", $valorfruta, time() + 3*24*3600);
  } 

  // Borrado de cookies y variables (no tiene sentido poner ningún valor porque lo voy a borrar)
  if (isset($_POST["borrar"])) {
    setcookie("fruta", NULL, -1);
    header("Refresh:0"); // Recargo la página
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
      if (!isset($valorfruta)) {
        echo "No has elegido todavía a tu fruta favorita.<br>";
        echo "Utiliza el siguiente formulario para hacerlo.<br>";
      } else {
        echo "<h2> Fruta favorita: ".$valorfruta."</h2>";
        echo "Introduce un nuevo valor si quieres cambiar tus preferencias.<br>";
      }
    ?>
    <form action="#" method="post">
      Fruta  <input type="text" name ="fruta"><br>
      <input type="submit" name="cambiar" value="Cambiar cookie">
      <input type="submit" name="borrar"  value="Borrar  cookie">
    </form>
    <hr>

</html>
