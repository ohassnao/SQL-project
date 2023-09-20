<?php
include_once 'connection.php';
include "header.php";

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE STAGIAIRE set CODE_STAG='" . $_POST['CODE_STAG'] . "', 
NOM_STAG='" . $_POST['NOM_STAG'] . "', 
PRENOM_STAG='" . $_POST['PRENOM_STAG'] . "', 
DURE_STAG='" . $_POST['DURE_STAG'] . "',
ID_BIB='" . $_POST['ID_BIB'] . "'
WHERE CODE_STAG='" . $_POST['CODE_STAG'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM STAGIAIRE WHERE CODE_STAG='" . $_GET['CODE_STAG'] . "'");
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
         <p class="page-header" style="text-align: center"><b>UPDATE STAGIAIRE</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">CODE_STAG</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="CODE_STAG" value="<?php echo $row['CODE_STAG']; ?>" >
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PRENOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="PRENOM_STAG" value="<?php echo $row['PRENOM_STAG']; ?>" :  id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NOM</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NOM_STAG" value="<?php echo $row['NOM_STAG']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">DUREE STAGE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="DURE_STAG" value="<?php echo $row['DURE_STAG']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID_BIB</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_BIB" value="<?php echo $row['ID_BIB']; ?>" id="name" required>
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