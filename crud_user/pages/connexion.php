<?php 
	include('headerConnexion.php');
	if (!empty($_SESSION['USER'])) {
		if ( ($_SESSION['USER']['niveau'] == 1) OR ($_SESSION['USER']['niveau'] == 2) ){
			header('location: UserAccount.php');
		}
		if ($_SESSION['USER']['niveau'] == 5) {
			header('location: ../index.php');
		}
	} else{
?>
			<div class="row ">
				<div class=" form1 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
					<h3 class="form2"> CONNECTEZ VOUS A VOTRE COMPTE </h3> 
					<div class="text-center" style="color: rgb(255,6,6);">
						 <b>
						 	<?php 
							 	if (!empty($_SESSION['errormail']) AND !empty($_SESSION['errorpass'])){
							 		echo (" Cet Utilisateur N'existe pas !");
							 	}

							 	if (!empty($_SESSION['EtatCompte'])){
							 		echo (" Votre Compte a été Supprimer pour des raisons de securité !");
							 	}

						  ?> 
						 </b>
					</div>
					<form enctype="multipart/form-data"  method="post"  action="TraitementConnexion.php"  id="myform" style="margin-top: 20px; margin-bottom: 10px;">

								<!-- Email -->
								<label for="Email">
								  <sup style="color: red;">* </sup> <span style="color: aqua;"> E-mail : </span> 
								  <?php
								   if ( isset($_SESSION['errormail']) AND empty($_SESSION['errorpass']) ){
								    echo ('<span style ="color: rgb(255,6,6); margin-left: 50px;">'.$_SESSION['errormail'].'</span>');
								   } 
								  ?>
								</label>
								<div class="input-group">
									<span class="input-group-addon essai"> <span class="glyphicon glyphicon-envelope"> </span> </span>
									<input class="form-control inputt" type="email" name="email" id="Email" required="" placeholder="Example@example.com" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">
									<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
								</div>
								<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
								
						
								<!-- Mot de passe -->
								<label for="Tel">
									 <sup style="color: red;">* </sup> <span style="color: aqua;"> Password : </span>
									 <?php
									   if (isset($_SESSION['errorpass']) AND empty($_SESSION['errormail'])){
									    echo ('<span style ="color: rgb(255,6,6); margin-left: 50px;">'.$_SESSION['errorpass'].'</span>'); 
									   } 
								  ?>
								</label>
								<div class="input-group">
									<span class="input-group-addon essai"> <span class="glyphicon glyphicon-lock"> </span> </span>
									<input class="form-control" type="PassWord" name="Pswd" id="Pswd" required="" minlength="5" placeholder="***************">
									<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
								</div>
								<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
								
								
								<!-- bouttons -->
									<button id="Clear" class="btn btn-danger " type="reset"> Annuler </button>

									<button id="Send" class="btn btn-success " type="submit" style="margin-left: 20px;"> Connexion </button>
								<!-- buttons -->

					</form>		
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="boostrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
   	var cpt = 0;
		var Message_erreur = document.getElementsByClassName('al');
		var Etoile_erreur = document.getElementsByTagName('sup');
		var Valid = document.getElementsByClassName('Valid');
		var Send = document.getElementById('Send');
		var Zone = document.getElementsByTagName('input');
		var pays = document.getElementById('Nationalite');
		var formulaire = document.getElementsByTagName('form');
		var Clear = document.getElementById('Clear');

		// Masquage Message erreur
		function Masque() {	
			for (var i = Message_erreur.length - 1; i >= 0; i--) {
			  Message_erreur[i].style.opacity = '0';
			}

			for (var i = Etoile_erreur.length - 1; i >= 0; i--) {
				Etoile_erreur[i].style.opacity = '0';
			}

			for (var i = Valid.length - 1; i >= 0; i--) {
				Valid[i].style.opacity = '0';
			}

		}
		Masque();

		// Detection Appui Boutton Send
		Send.addEventListener('click' , function(){
			for (var i = Zone.length - 1; i >= 0; i--) {
				if (Zone[i].value == 0 || pays.value == "disabled" ) {
					Message_erreur[i].style.opacity = '1';
					cpt+=1;
				}

				if (cpt != 0) {
					formulaire.submit();
					break;
				}
			}
		})


		// Detection appui sur Clear
		Clear.addEventListener('click' , function(){
			Masque();
		})

		// Evenement sur Email
		Zone[0].addEventListener('blur' , function(){
			Valid[0].style.opacity = '1';
			if (Zone[0].value == 0 || Zone[0].value == "disabled" ) {
					Message_erreur[0].style.opacity = '1';
					Etoile_erreur[0].style.opacity = '1';
					Zone[0].style.boxShadow = '0px 0px 5px red';
					Zone[0].style.backgroundColor = 'rgb(255,202,202)';
			}else{
					Message_erreur[0].style.opacity = '0';
					Etoile_erreur[0].style.opacity = '0';
					Zone[0].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					Zone[0].style.backgroundColor = 'rgb(183,255,179)';
			}
		})


		// Evenement sur password
		Zone[1].addEventListener('blur' , function(){
			Valid[1].style.opacity = '1';
			if (Zone[1].value == 0 || Zone[1].value == "disabled" ) {5
					Message_erreur[1].style.opacity = '1';
					Etoile_erreur[1].style.opacity = '1';
					Zone[1].style.boxShadow = '0px 0px 5px red';
					Zone[1].style.backgroundColor = 'rgb(255,202,202)';
			}else{
					Message_erreur[1].style.opacity = '0';
					Etoile_erreur[1].style.opacity = '0';
					Zone[1].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					Zone[1].style.backgroundColor = 'rgb(183,255,179)';
			}
		})
	</script>
	<?php 
		unset($_SESSION['errormail']);
		unset($_SESSION['errorpass']);
		unset($_SESSION['EtatCompte']);
	?>
</html>
<?php } ?>