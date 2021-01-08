<?php
  require 'config.php';
  if($_POST){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $id=$_POST['id'];

    $pdoStatement=$pdo->prepare("UPDATE todo SET title='$title',description='$description' WHERE id='$id' ");
    $result=$pdoStatement->execute();

    if($result){
      echo "<script>alert('ToDo is updated.');window.location.href='index.php';</script>";
    }

  }else{
    $pdoStatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdoStatement->execute();
    $value=$pdoStatement->fetchAll();
  }
 ?>

 <html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h2> Update Todo</h2>
        <form class="" action="" method="post">
          <input type="hidden" name="id" value="<?= $value[0]['id'] ?>"/>
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value=" <?= $value[0]['title'] ?>" required/>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="8" cols="80" required/><?= $value[0]['description'] ?></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="UPDATE">
            <a href="index.php" type="button" class="btn btn-warning" >BACK</a>
          </div>
        </form>
      </div>
    </div>
  </body>
 </html>
