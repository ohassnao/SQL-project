<?php
include_once 'connection.php';
include "header.php";

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE Document set ID_DOC='" . $_POST['ID_DOC'] . "', 
TITRE_DOC='" . $_POST['TITRE_DOC'] . "', 
ANNEE_PUB='" . $_POST['ANNEE_PUB'] . "', 
TYPEE='" . $_POST['TYPEE'] . "' ,
NUM_EDIT='" . $_POST['NUM_EDIT'] . "' ,
ID_CATEGORIE='" . $_POST['ID_CATEGORIE'] . "' 
WHERE ID_DOC='" . $_POST['ID_DOC'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM Document WHERE ID_DOC='" . $_GET['ID_DOC'] . "'");
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
         <p class="page-header" style="text-align: center"><b>UPDATE DOCUMENT</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Username" class="col-sm-2 control-label">ID_DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_DOC" value="<?php echo $row['ID_DOC']; ?>" >
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">TITRE_DOC</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="TITRE_DOC" value="<?php echo $row['TITRE_DOC']; ?>" :  id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ANNEE_PUB</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ANNEE_PUB" value="<?php echo $row['ANNEE_PUB']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">TYPE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="TYPEE" value="<?php echo $row['TYPEE']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">NUM EDIT</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="NUM_EDIT" value="<?php echo $row['NUM_EDIT']; ?>" id="name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">ID_CATEGORIE</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="ID_CATEGORIE" value="<?php echo $row['ID_CATEGORIE']; ?>" id="name" required>
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