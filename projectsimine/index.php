
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
        <div class="content">
            <h1>MyLibrary <br><span>My House !<br><br></span>
     

                <button class="cn"><a href="allbooks.php">ALL BOOKS</a></button>
    <div class="form" >
         <h2  >LOGIN</h2>
            <form   method="post" action="index.php" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="Enter user Here" id="username" required>
                    <input type="password"  name="password" placeholder="Enter Password(admin)" id="password" required>
                    <button type="submit" class="btnn" name="submit"><a>Login</a></button>
         </form> 
    </div>
</div>
    </div>
    <?php
   session_start(); 
   
   if ((isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
   	header("Location: admin.php");
   	exit();
   }
   
   	if (isset($_GET['access'])) {
   		$alert_user = true;
   	}
   
   require 'connection.php';
   include "header.php";
   
   
   
   echo"<br>";
   
   if(isset($_POST['submit'])){
   	$username = trim($_POST['username']);
   	$password = trim($_POST['password']);
   
    $sql_stagiaire = "SELECT * from STAGIAIRE where PRENOM_STAG = '$username' and  CODE_STAG = '$password' ";
   	$sql_admin = "SELECT * from Bibliothecaire where username = '$username' and  password = '$password' ";
    $query2 = mysqli_query($conn, $sql_stagiaire);
   	$query = mysqli_query($conn, $sql_admin);
   	// echo mysqli_error($conn);
   	if(mysqli_num_rows($query) > 0)
   	{
   			
   				while($row = mysqli_fetch_assoc($query)){
   					$_SESSION['auth'] = true;
   					$_SESSION['admin'] = $row['username'];		
   					}
   					if ($_SESSION['auth'] === true) {
   				header("Location: admin.php");
   				exit();
   					}
   	}
   	else 
    {
   		echo"<div class='alert alert-success alert-dismissable'>
   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
   		<strong style='text-align: center'> Wrong Username and Password.</strong>  </div>";
   	}
       if(mysqli_num_rows($query2) > 0)
   	{
   			
   				while($row2 = mysqli_fetch_assoc($query2)){
   					$_SESSION['auth'] = true;
   					$_SESSION['stagiaire'] = $row2['PRENOM_STAG'];		
   					}
   					if ($_SESSION['auth'] === true) {
   				header("Location: empruntestag.php");
   				exit();
   					}
   	}
   	else 
    {
   		echo"<div class='alert alert-success alert-dismissable'>
   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
   		<strong style='text-align: center'> Wrong Username and Password.</strong>  </div>";
   	}			
   	}
   					
   ?>
</body>

<?php if (isset($alert_user)) { ?>
<!-- <script type="text/javascript">
   swal("Oops...", "You are not allowed to view this page directly...!", "error");
</script> --> 
<?php } ?>
</body>
</html>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
<?php if (isset($alert_user)) { ?>
<!-- <script type="text/javascript">
   swal("Oops...", "You are not allowed to view this page directly...!", "error");
</script> --> 
<?php } ?>
</body>
</html>