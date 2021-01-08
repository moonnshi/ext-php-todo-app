<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <title>Home</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
 </head>
 <body>
   <?php
      require 'config.php';
      $pdoStatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
      $pdoStatement->execute();
      $result=$pdoStatement->fetchAll();
    ?>
   <div class="card">
     <div class="card-body">
       <h1>To Do Home Page</h1>
       <div>
         <a href="add.php" class="btn btn-success">Create</a>
       </div>
       <table class="table table-striped">
         <thead>
           <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Description</th>
             <th>Created</th>
             <th>Actions</th>
           </tr>
         </thead>
         <tbody>
           <?php if($result){
             $i=1;
             foreach ($result as $value){
               ?>
               <tr>
                 <td><?php echo $i?></td>
                 <td><?php echo $value['title']?></td>
                 <td><?php echo $value['description']?></td>
                 <td><?php echo date('Y-m-d',strtotime($value['created_at']))?></td>
                 <td>
                   <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id']?>">Edit</a>
                   <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id']?>">Delete</a>
                 </td>
               </tr>
               <?php
               $i++;
             }
           }
           ?>
         </tbody>
       </table>
     </div>
   </div>
 </body>
 </html>
