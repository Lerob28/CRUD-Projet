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
						<th class="text-center id"> id </th>
						<th class="text-center nom"> Nom </th>
						<th class="text-center prenom"> Prenom </th>
						<th class="text-center etat"> Etat </th>
						<th class="text-center action" style="width: 250px;"> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					$response = $bdd->query('SELECT nom, prenom, photo, niveau FROM utilisateur WHERE niveau!=5');
					$i = 0;
					$user = array();
					while ($donnees = $response->fetch()) {
						$user[$i] = $donnees; ?>
							<tr>
								<th style="background-color: grey;"><?php echo $i; ?></th>
								<td style="background-color: grey;"><?php echo $donnees['nom']; ?></td> 
								<td style="background-color: grey;"><?php echo $donnees['prenom']; ?></td> 
								<td style="background-color:grey;text-align:center;">';
									<?php if ($donnees['niveau'] == 1) { ?>
										<span style='color:green;font-weight:800;'> actif <span>
									<?php } else if ($donnees['niveau'] == 2) {  ?>
										<span style='color:orange;font-weight:800;'> inactif <span>
									<?php } else { ?>
										<span style='color:red;font-weight:800;'> deleted <span>
									<?php  } ?>
								</td>
								<td style="background-color: rgba(0,0,0,0.6);">
										<div class="text-center" style="font-size: 10px;"> 
											<a href="#"><span class="fa fa-pencil " style="color:marron; font-size: 14px;"> editer </span></a>';
											<?php if($donnees['niveau'] <=2 ){ ?>
												<a href="delete.php"><span class="fa fa-remove"style="margin-left: 10px;color:red; font-size: 14px;"> supprimer </span></a>
											<?php 	} 
											if ($donnees['niveau'] == 1) { ?>
							       <a href="#"><span class="glyphicon glyphicon-remove-circle"style="margin-left: 10px;color:orange; font-size: 14px;"> desactiver </span></a>
										<?php	} else { ?>
											<a href="#"><span class="glyphicon glyphicon-ok"style="margin-left: 10px;color:green; font-size: 14px;">activer </span></a>
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



<input type="text" value=" <?php $user[$i]['email'] ?>




















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
						<th class="text-center id"> id </th>
						<th class="text-center nom"> Nom </th>
						<th class="text-center prenom"> Prenom </th>
						<th class="text-center etat"> Etat </th>
						<th class="text-center action" style="width: 250px;"> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					$response = $bdd->query('SELECT nom, prenom, photo, niveau FROM utilisateur WHERE niveau!=5');
					$i = 0;
					$user = array();
					while ($donnees = $response->fetch()) {
						$user[$i] = $donnees;
						echo '
							<tr>
								<th style="background-color: grey;">' . $i . '</th>
								<td style="background-color: grey;">' . $donnees['nom'] . '</td> 
								<td style="background-color: grey;">' . $donnees['prenom'] . '</td> 
								       <td style="background-color:grey;text-align:center;">';
						if ($donnees['niveau'] == 1) {
							echo "<span style='color:green;font-weight:800;'> actif <span>";
						} else if ($donnees['niveau'] == 2) {
							echo "<span style='color:orange;font-weight:800;'> inactif <span>";
						} else {
							echo "<span style='color:red;font-weight:800;'> deleted <span>";
						}

						echo  '</td>
									<td style="background-color: rgba(0,0,0,0.6);">
										<div class="text-center" style="font-size: 10px;"> 
											<a href="#"><span class="fa fa-pencil " style="color:marron; font-size: 14px;"> editer </span></a>';
											if($donnees['niveau'] <=2 ){
												echo '<a href="delete.php"><span class="fa fa-remove"style="margin-left: 10px;color:red; font-size: 14px;"> supprimer </span></a>';
											}
											
						if ($donnees['niveau'] == 1) {
							echo '<a href="#"><span class="glyphicon glyphicon-remove-circle"style="margin-left: 10px;color:orange; font-size: 14px;"> desactiver </span></a>';
						} else {

							echo '<a href="#"><span class="glyphicon glyphicon-ok"style="margin-left: 10px;color:green; font-size: 14px;">activer </span></a>
								   </div> 
									</td>
								</tr>';
						}
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





<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>






<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->