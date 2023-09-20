<?php
   require 'connection.php';
   include "header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $ID_UTILISATEUR = $_POST['ID_EMPRUNTE'];
       $NOM = $_POST['DATE_DEBUT'];
       $PRENOM = $_POST['DATE_FIN'];
       $CTG = $_POST['NUM_ORDRE'];
       $AMENDE_FORFAITAIRE = $_POST['DATE_ACHAT'];
       $id_util = $_POST['ID_UTILISATEUR'];
   
   
   
         $sql = "INSERT INTO Emprunte(ID_EMPRUNTE,DATE_DEBUT, DATE_FIN, NUM_ORDRE,DATE_ACHAT ,ID_UTILISATEUR) VALUES ('$ID_UTILISATEUR',  '$NOM', '$PRENOM','$CTG', '$AMENDE_FORFAITAIRE' ,'$id_util' ) ";
   
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
         <p class="page-header" style="text-align: center"><b>ADD EMPRUNTE</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="addemprunte.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">ID EMPRUNTE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_EMPRUNTE" placeholder="ID EMPRUNTE" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DATE DEBUT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DATE_DEBUT" placeholder="DATE DEBUT" id="date" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DATE FIN</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DATE_FIN" placeholder="DATE FIN" id="date" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NUM_ORDRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_ORDRE" placeholder="NUM_ORDRE" id="NAME" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DATE_ACHAT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DATE_ACHAT" placeholder="DATE ACHAT" id="date" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID UTILISATEUR</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_UTILISATEUR" placeholder="ID_UTILISATEUR" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD EMPRUNTE
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