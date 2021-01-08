<?php
  require 'config.php';

    $pdoStatement=$pdo->prepare("DELETE FROM todo WHERE id='$_GET[id]'");
    $result=$pdoStatement->execute();

    header("Location: index.php");

    

 ?>
