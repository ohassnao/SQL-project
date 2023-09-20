<?php
include_once 'connection.php';
include "header.php";

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE EXEMPLAIRE set NUM_ORDRE='" . $_POST['NUM_ORDRE'] . "', 
DATE_ACHAT='" . $_POST['DATE_ACHAT'] . "', 
ETAT='" . $_POST['ETAT'] . "', 
STATUT='" . $_POST['STATUT'] . "', 
NOMBRE_EXEMPLAIRE='" . $_POST['NOMBRE_EXEMPLAIRE'] . "', 
ID_DOC='" . $_POST['ID_DOC'] . "' WHERE NUM_ORDRE='" . $_POST['NUM_ORDRE'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM EXEMPLAIRE WHERE NUM_ORDRE='" . $_GET['NUM_ORDRE'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<head>
    <title>MyLibrary</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <div class= "main">
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
      <div><?php if(isset($message)) { echo $message; } ?>
         <p class="page-header" style="text-align: center"><b>UPDATE EXEMPLAIRE</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">NUM_ORDRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_ORDRE" value="<?php echo $row['NUM_ORDRE']; ?>" >
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DATE_ACHAT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DATE_ACHAT" value="<?php echo $row['DATE_ACHAT']; ?>" :  id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ETAT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ETAT" value="<?php echo $row['ETAT']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">STATUT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="STATUT" value="<?php echo $row['STATUT']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NOMBRE_EXEMPLAIRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOMBRE_EXEMPLAIRE" value="<?php echo $row['NOMBRE_EXEMPLAIRE']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID_DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_DOC" value="<?php echo $row['ID_DOC']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit" value="Submit">
                     UPDATE DATA
                     </button>                            
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
    </div>
</body>
</html>