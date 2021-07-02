<?php 
	include('headerInscription.php');
?>
		<div class="row ">
			<div class=" form1 col-md-offset-3 col-md-7" style="border-radius: 20px; box-shadow: 0px 0px 20px rgba(32, 255, 255, 0.5);">
				<h3 class="form2">INSCRIVEZ VOUS GRATUITEMENT </h3>
				<h4 class="text-center" style="color: aqua ;"> Rejoindre la plus grande communauté des developpeurs de InchClass</h4>
				<div class="text-center" style="color: rgb(255,6,6);">
					 <?php 
						 	if (isset($_SESSION['message_error'])) {
						 		echo ($_SESSION['message_error']);
						 	}
					  ?>
				</div>
				<form enctype="multipart/form-data" method="post" action="traitement.php" id="myform" style="margin-top: 20px; margin-bottom: 80px;">

					<div class="col-md-7">
							<!-- Noms -->
							<label for="Nom"> <sup style="color: red;">* </sup>  Nom : </label>
							<div class="input-group">
								<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
								<input  class="form-control inputt validity " type="text" name="nom" id="Nom" required="" placeholder="Votre Nom" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" title=" saisir votre nom sans caractere special">
								<span class="input-group-addon essai Valid"> <span class="validity " style="background-color: none;"></span> </span>
							</div>
							<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>

							<!-- Prenoms -->
							<label for="Prenom"> <sup style="color: red;">* </sup> Prenom : </label>
							<div class="input-group">
								<span Class="input-group-addon essai"><span class="glyphicon glyphicon-user"></span></span>
								<input class="form-control inputt" type="text" name="prenom" id="Prenom" required="" placeholder="Votre Prenom" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50">
								<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"> </span></span>
							</div>
							<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>

							<!-- Email -->
							<label for="Email"> <sup style="color: red;">* </sup> E-mail : </label>
							<div class="input-group">
								<span class="input-group-addon essai"> <span class="glyphicon glyphicon-envelope"> </span> </span>
								<input class="form-control inputt" type="email" name="email" id="email" required="" placeholder="Example@example.com" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">
								<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
							</div>
							<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>

							<!-- Mot de passe -->
							<label for="Tel"> <sup style="color: red;">* </sup> PassWord : </label>
							<div class="input-group">
								<span class="input-group-addon essai"> <span class="glyphicon glyphicon-lock"> </span> </span>
								<input class="form-control inputt" type="PassWord" name="pwd" id="Pswd" required="" minlength="5" title="Entrer un mot de passe d'au moins 5 caracteres">
								<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
							</div>
							<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
							
							
					</div>

					<div class="col-md-5">
							
							<!-- Photo profil -->
							<label for="photo" ><sup style="color: red;">* </sup> Ajoutez Votre photo ( <span style="color: aqua;"> .png, .jpeg, .jpg | 100 Mo </span> ) <br><br></label>
							<div class="input-group">
								<span class="input-group-addon essai"> <span class="glyphicon glyphicon-picture"></span> </span>
								<input class="form-control inputt" type="file" id="photo" name="photo" accept="image/*" onchange="loadFile(event)" required=""/><br>
								<span class="input-group-addon essai Valid"> <span class="validity" style="background-color: none;"></span> </span>
							</div>
							<p class="al" style="color:red;"> Veillez Remplir le champ ci dessus </p>
							<div class="im" style=" margin-left: 60px;">
                <img id="pp">
          		</div>
          		<input type="hidden" name="niveau" value="1">
					</div>

					<div class=" pull pull-right" style="position: absolute; bottom: 0; right: 0; padding-bottom: 8px; ">
						<input id="Clear" class="btn btn-danger " type="reset" value="ANNULER"> 
						<input id="Send" class="btn btn-success " type="submit" value="CREER" style="margin: 0 40px;">
					</div>

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
		// console.log(Zone);
		console.log(formulaire);

    // previsualisation image dans formulaire
		var loadFile = function(event) {
    var profil = document.getElementById('pp');
      profil.src = URL.createObjectURL(event.target.files[0]);
    };


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

		// Evenement sur nom
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

		// Evenement sur prenom
		Zone[1].addEventListener('blur' , function(){
			Valid[1].style.opacity = '1';
			if (Zone[1].value == 0 || Zone[0].value == "disabled" ) {
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

		// Evenement sur Email
		Zone[2].addEventListener('blur' , function(){
			Valid[2].style.opacity = '1';
			if (Zone[2].value == 0 || Zone[2].value == "disabled" ) {
					Message_erreur[2].style.opacity = '1';
					Etoile_erreur[2].style.opacity = '1';
					Zone[2].style.boxShadow = '0px 0px 5px red';
					Zone[2].style.backgroundColor = 'rgb(255,202,202)';
			}else{
					Message_erreur[2].style.opacity = '0';
					Etoile_erreur[2].style.opacity = '0';
					Zone[2].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					Zone[2].style.backgroundColor = 'rgb(183,255,179)';
			}
		})

		// Evenement sur password
		Zone[3].addEventListener('blur' , function(){
			Valid[3].style.opacity = '1';
			if (Zone[3].value == 0 || Zone[3].value == "disabled" ) {
					Message_erreur[3].style.opacity = '1';
					Etoile_erreur[3].style.opacity = '1';
					Zone[3].style.boxShadow = '0px 0px 5px red';
					Zone[3].style.backgroundColor = 'rgb(255,202,202)';
			}else{
					Message_erreur[3].style.opacity = '0';
					Etoile_erreur[3].style.opacity = '0';
					Zone[3].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					Zone[3].style.backgroundColor = 'rgb(183,255,179)';
			}
		})

		// Evenement sur image
		Zone[4].addEventListener('change' , function(){
			Valid[4].style.opacity = '1';
			if (Zone[4].value == 0 || pays.value == "disabled" ) {
					Message_erreur[4].style.opacity = '1';
					Etoile_erreur[4].style.opacity = '1';
					Zone[4].style.boxShadow = '0px 0px 5px red';
					Zone[4].style.backgroundColor = 'rgb(255,202,202)';
			}else{
					Message_erreur[4].style.opacity = '0';
					Etoile_erreur[4].style.opacity = '0';
					Zone[4].style.boxShadow = '0px 0px 5px rgb(0, 255, 0)';
					Zone[4].style.backgroundColor = 'rgb(183,255,179)';
			}
		})
	</script>
</html>
