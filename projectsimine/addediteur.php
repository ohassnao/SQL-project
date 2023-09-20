<?php
   require 'connection.php';
   include "header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $ID_DOC = $_POST['NUM_EDIT'];
       $TITRE_DOC = $_POST['NOM_EDIT'];
       $ANNEE_PUB = $_POST['PRENOM_EDIT'];
       $TYPEE = $_POST['TEL_EDIT'];
   
   
   
         $sql = "INSERT INTO EDITEUR( NUM_EDIT, NOM_EDIT, PRENOM_EDIT,TEL_EDIT) VALUES ('$ID_DOC',  '$TITRE_DOC', '$ANNEE_PUB','$TYPEE') ";
   
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
         <p class="page-header" style="text-align: center"><b>ADD EDITEUR</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="addediteur.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">NUM EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_EDIT" placeholder="NUM_EDIT" id="id_no" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NOM EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOM_EDIT" placeholder="NOM EDIT" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PRENOM EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="PRENOM_EDIT" placeholder="NOM EDIT" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">TEL EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="TEL_EDIT" placeholder="TEL EDIT" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD editeur
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