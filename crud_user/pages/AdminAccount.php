<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Welcome Master </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../CSS/AdminAccount.css">
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
				<a class="navbar-brand" href="#"> <span class="My"> Inch </span> <span class="Formular"> Class </span> </a>
			</div>
			<ul class="nav navbar-nav navbar-right text-center Menu">
				<li style="margin-top: 25px;"> <?php echo $_SESSION['USER']['nom'] . "  " . $_SESSION['USER']['prenom'] ?> </li>
				<li style="margin-right: 25px;" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?php echo "<img class='img-circle' src='../Images/" . $_SESSION['USER']['photo'] . " ' style=\"height:40px; width:40px;\">" ?>
					</a>
					<ul class="dropdown-menu" style="background-color: inherit;">
						<li><a href="profil.php"> Mon Profil </a></li>
						<li><a href="deconnection.php"> Deconnexion </a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="row text-center" style="color: aqua; font-size: 30px; margin: 25px 0; "> Liste Des Membres Inscrits Sur La Plateforme </div>
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr style="background-color: black;">
						<th class="text-center id"style="width: 30px;"> id </th>
						<th class="text-center nom"style="width: 250px;"> Nom </th>
						<th class="text-center prenom" style="width: 250px;"> Prenom </th>
						<th class="text-center etat" style="width: 80px;"> Etat </th>
						<th class="text-center action" style="width: 90px;"> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					$response = $bdd->query('SELECT * FROM utilisateur WHERE niveau!=5');
					$i = 0;
					$user = array();
					while ($donnees = $response->fetch()) {
						$user[$i] = $donnees; ?>
							<tr>
								<th style="background-color: grey;"><?php echo $i; ?></th>
								<td style="background-color: grey;"><?php echo $donnees['nom']; ?></td> 
								<td style="background-color: grey;"><?php echo $donnees['prenom']; ?></td> 
								<td style="background-color:grey;">
									<?php if ($donnees['niveau'] == 1) { ?>
										<span style='color:green;font-weight:800;'> actif <span>
									<?php } else if ($donnees['niveau'] == 2) {  ?>
										<span style='color:orange;font-weight:800;'> inactif <span>
									<?php } else { ?>
										<span style='color:red;font-weight:800;'> deleted <span>
									<?php  } ?>
								</td>
								<td style="background-color: rgba(0,0,0,0.6);"> 
									<div style="font-size: 1px;"> 
										<form enctype="multipart/form-data" method="post" action="Management.php" style=" display: inline-block;">
											<a href="#">
												<input type="hidden" name="N1"  value="<?php echo $user[$i]['id']; ?>">
												<input type="hidden" name="N2"  value="consulter">
												<button style="background-color:inherit; border: none;" title="consulter">
												  <span class="fa fa-eye " style="margin-left: 10px; color:aqua; font-size: 13px;" alt="consulter"></span>
												</button>
											</a>
										</form>
										<!-- <form enctype="multipart/form-data" method="post" action="Management.php" style=" display: inline-block;">
											<a href="#">
												<input type="hidden" name="N1"  value="<?php echo $user[$i]['id']; ?>">
												<input type="hidden" name="N2"  value="editer">
												<button  type="submit" style="background-color:inherit; border: none;" title="editer">
													<span class="fa fa-pencil editer" style=" margin-left: 10px; color:blue; font-size: 13px;" alt="editer"></span>
												</button>
											</a>
										</form> -->
										<?php if($donnees['niveau'] <=2 ){ ?>
										<form enctype="multipart/form-data" method="post" action="Management.php" style=" display: inline-block;">
											<a href="#">
												<input type="hidden" name="N1"  value="<?php echo $user[$i]['id']; ?>">
												<input type="hidden" name="N2"  value="supprimer">
												<button  type="submit" style="background-color:inherit; border: none;" title="supprimer">
													<span class="fa fa-trash Supprimer" style="margin-left: 10px;color:red; font-size: 13px;"></span>
												</button>
											</a>
										</form>
										<?php 	} 
										if ($donnees['niveau'] == 1) { ?>
						      		<form enctype="multipart/form-data" method="post" action="Management.php" style=" display: inline-block;">
						      			<a href="#">
						      				<input type="hidden" name="N1"  value="<?php echo $user[$i]['id']; ?>">
						      				<input type="hidden" name="N2"  value="desactiver">
						      				<button  type="submit" style="background-color:inherit; border: none;" title="desactiver">
						      					<span class="glyphicon glyphicon-remove-circle activer_inverse" style="margin-left: 10px;color:orange; font-size: 13px;"></span>
						      				</button>
						      			</a>
						      		</form>
										<?php	} else { ?>
									   <form enctype="multipart/form-data" method="post" action="Management.php" style=" display: inline-block;">
									  		<a href="#">
									  			<input type="hidden" name="N1"  value="<?php echo $user[$i]['id']; ?>">
									  			<input type="hidden" name="N2"  value="activer">
									  			<button  type="submit" style="background-color:inherit; border: none;" title="activer">
									  				<span class="glyphicon glyphicon-ok activer" style="margin-left: 10px;color:green; font-size: 13px;"></span>
									  			</button>
									  		</a>
									   </form>
							      </div>
								</td>
							</tr>
					<?php	}
						$i++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
</body>
</html>