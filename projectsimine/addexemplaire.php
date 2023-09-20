<?php
   require 'connection.php';
   include "header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $ID_UTILISATEUR = $_POST['NUM_ORDRE'];
       $NOM = $_POST['DATE_ACHAT'];
       $PRENOM = $_POST['ETAT'];
       $CTG = $_POST['STATUT'];
       $AMENDE_FORFAITAIRE = $_POST['NOMBRE_EXEMPLAIRE'];
       $id_util = $_POST['ID_DOC'];
   
   
   
         $sql = "INSERT INTO EXEMPLAIRE(NUM_ORDRE, DATE_ACHAT, ETAT ,STATUT, NOMBRE_EXEMPLAIRE, ID_DOC) VALUES ('$ID_UTILISATEUR',  '$NOM', '$PRENOM','$CTG', '$AMENDE_FORFAITAIRE' ,'$id_util' ) ";
   
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
         <p class="page-header" style="text-align: center"><b>ADD EXEMPLAIRE</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="addexemplaire.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">NUM_ORDRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_ORDRE" placeholder="NUM_ORDRE" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DATE_ACHAT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DATE_ACHAT" placeholder="DATE_ACHAT" id="date" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ETAT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ETAT" placeholder="ETAT" id="NAME" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">STATUT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="STATUT" placeholder="STATUT" id="NAME" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NOMBREEXEMPLAIRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOMBRE_EXEMPLAIRE" placeholder="NOMBRE_EXEMPLAIRE" id="ID_NO" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID_DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_DOC" placeholder="ID_DOC" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD exemplaire
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