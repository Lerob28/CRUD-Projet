<?php 
	session_start();
	if (isset($_SESSION['USE'])) {
		$nom = $_SESSION['USE']['nom'];
		$prenom = $_SESSION['USE']['prenom'];
		$email = $_SESSION['USE']['email'];
		$pswd = $_SESSION['USE']['pwd'];
		$image = $_SESSION['USE']['photo'];
		$id = $_SESSION['USE']['id'];
	} else {
		$nom = $_SESSION['USER']['nom'];
		$prenom = $_SESSION['USER']['prenom'];
		$email = $_SESSION['USER']['email'];
		$pswd = $_SESSION['USER']['pwd'];
		$image = $_SESSION['USER']['photo'];
		$id = $_SESSION['USER']['id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Mon Profil </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
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
		        <li style="margin-top: 25px;"> <?php echo $nom." ".$prenom ?> </li>
		        <li style="margin-right: 25px;" class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          	<?php echo "<img class='img-circle' src='../Images/".$image." ' style=\"height:40px; width:40px;\">" ?>
		          </a>
		         <!--  <ul class="dropdown-menu"style="background-color: inherit;">
		            <li><a href="deconnection.php"> Deconnexion </a></li> 
		          </ul> -->
		        </li>
	      </ul>
			</div>