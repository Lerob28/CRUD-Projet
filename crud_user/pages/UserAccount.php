<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Welcome <?php echo $_SESSION['USER']['prenom']; ?> </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../CSS/UserAccount.css">
	<meta name="viewport" content="width-device-width, initial-scale=1. shrink-to-fit=no">
</head>
<body class="corps">
	<div class="container-fluid">
			<div class="navbar navbar-default Navigation">
		    <div class="navbar-header ">
				   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				   </button>
				   <a class="navbar-brand" href="#"> <span class="My"> Inch </span> <span  class="Formular"> Class </span> </a>
		    </div>
			  <ul class="nav navbar-nav navbar-right text-center Menu">
		        <li style="margin-top: 25px;"> <?php echo $_SESSION['USER']['nom']."  ".$_SESSION['USER']['prenom'] ?> </li>
		        <li style="margin-right: 25px;" class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          	<?php echo "<img class='img-circle' src='../Images/".$_SESSION['USER']['photo']." ' style=\"height:40px; width:40px;\">" ?>
		          </a>
		          <ul class="dropdown-menu" style="background-color: inherit;">
		            <li style=" <?php if ($_SESSION['USER']['niveau'] == 2) { echo ' display: none; ';} ?>"><a href="profil.php"> Mon Profil </a></li>
		            <li><a href="deconnection.php"> Deconnexion </a></li>
		          </ul>
		        </li>
	        </ul>
			</div>
			<div class="row">
				<?php 
					if ($_SESSION['USER']['niveau'] == 2) { 
				 ?>
						<h3 style="color: aqua; margin-top: 200px;" class="text-center"> Ce compte Est Inactif, <strong style="color: blue;"> Veillez Contacter votre Admin ! </strong></h3>
				<?php  } ?>
			</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
</body>
</html>