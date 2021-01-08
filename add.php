<?php
  require 'config.php';
  if($_POST){
    $title=$_POST['title'];
    $description=$_POST['description'];

    $sql="INSERT INTO todo(title,description) values (:title,:description)";
    $pdoStatement=$pdo->prepare($sql);
    $result=$pdoStatement->execute(array(':title'=>$title,':description'=>$description));

    if($result){
      echo "<script>alert('New todo is added.');window.location.href='index.php';</script>";
    }
  }
 ?>

 <html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h2>Create New Todo</h2>
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value=" " required/>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" value=" " rows="8" cols="80" required/></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="SUBMIT">
            <a href="index.php" type="button" class="btn btn-warning" >BACK</a>
          </div>
        </form>
      </div>
    </div>
  </body>
 </html>
