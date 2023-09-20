<?php
   require 'connection.php';
   include "header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $ID_UTILISATEUR = $_POST['CODE_STAG'];
       $NOM = $_POST['NOM_STAG'];
       $PRENOM = $_POST['PRENOM_STAG'];
       $CTG = $_POST['DURE_STAG'];
       $AMENDE_FORFAITAIRE = $_POST['ID_BIB'];
   
   
   
         $sql = "INSERT INTO STAGIAIRE(CODE_STAG, NOM_STAG, PRENOM_STAG, DURE_STAG, ID_BIB) VALUES ('$ID_UTILISATEUR',  '$NOM', '$PRENOM','$CTG', '$AMENDE_FORFAITAIRE' ) ";
   
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
         <p class="page-header" style="text-align: center"><b>ADD STAGIAIRE</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="addstagiaire.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">NOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOM_STAG" placeholder="Nom" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PRENOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="PRENOM_STAG" placeholder="Prenom" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">CODE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="CODE_STAG" placeholder="CODE" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DUREE DE STAGE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DURE_STAG" placeholder="DUREE DE STAGE" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ENCADRANT(ID)</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_BIB" placeholder="ID_BIB" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD STAGIAIRE
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