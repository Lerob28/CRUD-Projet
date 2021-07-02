<?php 
	if (isset($_SESSION['USER'])) {
		if ($_SESSION['USER']['niveau'] == 5) {
			header('location: pages/AdminAccount.php');
		} else if ( ($_SESSION['USER']['niveau'] == 1) OR ($_SESSION['USER']['niveau'] == 2) ) {
			header('location: pages/UserAccount.php');
		}
	} else{ include('pages/header.php');
 ?>

	</div>
</body>
</html>
<?php } ?>






































<!-- <div class="row">
			<div class="form1 col-md-offset-3 col-md-6  col-sm-12 col-xs-12">
				<h3> Welcome to Our Page </h3>
				<div class="row">
					<div class="col-md-offset-3 col-md-3">
						<a href="inscription.php"> <button class="btn btn-info"> INSCRIPTION </button> </a>
					</div>
					<div class="col-md-3">
						<a href="connexion.php"> <button class="btn btn-info"> CONNEXION </button> </a>
					</div>
				</div>
			</div>
		</div> -->
