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
        </div> 
        <div class="container">
      <!-- navbar ends -->
      <!-- info alert -->
      <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
         <span class="glyphicon glyphicon-book"></span>
         <strong>List of Books in the Library</strong>
      </div>
   </div>
<div class="container">
<?php 
    include "connection.php"; 
    include "header.php";
?>
   <div class="row">
            <a href="index.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-home"></span>&nbsp&nbspHOME</button></a>
   </div>

   <div class="panel panel-default">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>ID_DOC</th>
               <th>TITRE_DOC</th>
               <th>ANNEE_PUB</th>
               <th>TYPE</th>
               <th>NUM_EDIT</th>
            </tr>
         </thead>
         <?php 
            $sql = "SELECT * from document";
            
            $query = mysqli_query($conn, $sql); 
            $counter = 1;
            while ($row = mysqli_fetch_array($query)) { ?>
         <tbody>
            <td><?php echo $row['ID_DOC']; ?></td>
            <td><?php echo $row['TITRE_DOC']; ?></td>
            <td><?php echo $row['ANNEE_PUB']; ?></td>
            <td><?php echo $row['TYPEE']; ?></td>
            <td><?php echo $row['NUM_EDIT']; ?></td>

         </tbody>
         <?php 	}
            ?>
      </table>
   </div>
</div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>