<?php
include_once 'connection.php';
include "header.php";

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE Utilisateur set ID_UTILISATEUR='" . $_POST['ID_UTILISATEUR'] . "', 
NOM='" . $_POST['NOM'] . "', 
PRENOM='" . $_POST['PRENOM'] . "', 
CTG='" . $_POST['CTG'] . "' ,
AMENDE_FORFAITAIRE='" . $_POST['AMENDE_FORFAITAIRE'] . "' 
WHERE ID_UTILISATEUR='" . $_POST['ID_UTILISATEUR'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM Utilisateur WHERE ID_UTILISATEUR='" . $_GET['ID_UTILISATEUR'] . "'");
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
         <p class="page-header" style="text-align: center"><b>UPDATE Utilisateur</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">ID_UTILISATEUR</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_UTILISATEUR" value="<?php echo $row['ID_UTILISATEUR']; ?>" >
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PRENOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="PRENOM" value="<?php echo $row['PRENOM']; ?>" :  id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOM" value="<?php echo $row['NOM']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">CTG</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="CTG" value="<?php echo $row['CTG']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">AMENDE_FORFAITAIRE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="AMENDE_FORFAITAIRE" value="<?php echo $row['AMENDE_FORFAITAIRE']; ?>" id="name" required>
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