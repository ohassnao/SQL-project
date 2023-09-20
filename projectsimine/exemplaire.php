<?php 
require 'connection.php';
include "header.php"; 

	if (isset($_POST['submit'])) {
		$id = $_POST['del_btn'];
		$sql = "DELETE from EXEMPLAIRE where NUM_ORDRE = '$id'";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			echo "<script>alert('exemplaire Deleted!')</script>";
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
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>EXEMPLAIRE</strong> Table
	</div>


	</div>
	<div class="container col-lg-11 ">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
		  	  <a href="addexemplaire.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add EXEMPLAIRE</button></a>
			  
			</div>
		  </div>
		  <table class="table table-bordered">
                <thead>
		               <tr>
		               	  <th>NUM_ORDRE</th> 
		               	  <th>DATE_ACHAT</th> 
		               	  <th>ETAT</th> 
		               	  <th>STATUT</th> 
		                  <th>NOMBRE_EXEMPLAIRE</th>
		                  <th>ID_DOC</th>
		                </tr>    
		          </thead>    
		          <?php 

		          $sql = "SELECT * FROM EXEMPLAIRE";
		          $query = mysqli_query($conn, $sql);
		          $counter = 1;
		          while ( $row = mysqli_fetch_assoc($query)) {        	
		           ?>
		          <tbody> 
		            <tr> 
		             <td><?php echo $row['NUM_ORDRE']; ?></td>
		             <td><?php echo $row['DATE_ACHAT']; ?></td>
		             <td><?php echo $row['ETAT']; ?></td>
		             <td><?php echo $row['STATUT']; ?></td>
		             <td><?php echo $row['NOMBRE_EXEMPLAIRE']; ?></td>
		             <td><?php echo $row['ID_DOC']; ?></td>
	             <td>
		             	<form action="updateexemplaire.php" method="post">
		             		<input type="hidden">
		             		<td><button class="btn btn-warning"><a href="updateexemplaire.php?NUM_ORDRE=<?php echo $row["NUM_ORDRE"]; ?>">Update</a></button></td>

		             	</form> 
		         	</td>
					 <td>
		             	<form action="exemplaire.php" method="post">
		             		<input type="hidden" value="<?php echo $row['NUM_ORDRE']; ?>" name="del_btn">
		             		<button name="submit" class="btn btn-warning">DELETE</button>
		             	</form> 
		         	</td>
		            </tr> 
		           
		         </tbody> 
		         <?php } ?>
		   </table>		 
	  </div>
	</div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>