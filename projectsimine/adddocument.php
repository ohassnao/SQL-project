<?php
   require 'connection.php';
   include "header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $ID_DOC = $_POST['ID_DOC'];
       $TITRE_DOC = $_POST['TITRE_DOC'];
       $ANNEE_PUB = $_POST['ANNEE_PUB'];
       $TYPEE = $_POST['TYPEE'];
       $NUM_EDIT = $_POST['NUM_EDIT'];
       $ID_CTG = $_POST['ID_CATEGORIE'];
   
   
   
         $sql = "INSERT INTO Document( ID_DOC, TITRE_DOC, ANNEE_PUB,TYPEE, NUM_EDIT, ID_CATEGORIE) VALUES ('$ID_DOC',  '$TITRE_DOC', '$ANNEE_PUB','$TYPEE','$NUM_EDIT', '$ID_CTG') ";
   
         $query = mysqli_query($conn, $sql);
         $error = false;
         if($query){
          $error = true;
         }
         else{
           echo "<script>alert('Registration failed!! Try again.');
                       </script>";
         }
        
   
   }
   
   ?>
   
   <!DOCTYPE html>
<html lang="en">
<head>
    <title>MyLibrary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"><a href="index.php">MyLibrary</a></h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="admin.php">HOME</a></li>
                    <li><a href="utilisateur.php">UTILISATEUR</a></li>
                    <li><a href="categorie.php">CATEGORIE</a></li>
                    <li><a href="documents.php">DOCUMENRTS</a></li>
                    <li><a href="emprunte.php">EMPRUNTE</a></li>
                    <li><a href="auteur.php">AUTEUR</a></li>
                    <li><a href="logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div> 
        <div class="container">
   <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
      <div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-10">
         <?php if(isset($error) && $error === true) { ?>
         <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Record added Successfully!</strong>
         </div>
         <?php } ?>
         <p class="page-header" style="text-align: center"><b>ADD DOC</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="adddocument.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">TITRE DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="TITRE_DOC" placeholder="TITRE DOC" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_DOC" placeholder="ID DOC" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ANNEE PUB</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ANNEE_PUB" placeholder="ANNEE PUB" id="date" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">TYPE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="TYPEE" placeholder="TYPE" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NUM EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_EDIT" placeholder="NUM EDIT" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID CTG</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_CATEGORIE" placeholder="ID_CATEGORIE" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD DOC
                     </button>                            
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>