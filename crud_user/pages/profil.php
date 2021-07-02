<?php 
	include('headerprofil.php');
 ?>
<div class="row">
	<h3 class="form2 col-md-offset-3 col-md-6"> Mes Informations Personelles  </h3>
	<div class=" form1 col-md-offset-3 col-md-6">
		<form enctype="multipart/form-data" method="post" action="#" id="form">
			<div class="col-md-offset-3 col-md-6 text-center" style="line-height: 30px; font-size: 15px;">
				<!-- Photo profil -->
				<div class="im">
					<input disabled="true" type="file" id="photo" name="photo" value="<?php echo $image ; ?>" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" onchange="loadFile(event)" style="height: 0;" />
	            <label for="photo" id="ppp"><img id="pp" class="img-circle" src=" ../Images/<?php echo $image ; ?>" style="border: 5px solid green;"> </label> 
	      	</div>

				<!-- Noms -->
				<div>
					<label for="Nom"> Nom :   </label>
					<input disabled="true" type="text" name="nom" id="Nom" value="<?php echo $nom ; ?>" required="" minlength="4"  maxlength="50" placeholder="Entrer votre Nom">
				</div>

				<!-- Prenoms -->
				<div>
					<label for="Prenom"> Prenom : </label>
					<input  disabled="true" type="text" name="prenom" id="Prenom" value="<?php echo $prenom ; ?>"  required="" minlength="4"  maxlength="50" placeholder="Entrer votre prenom">
				</div>

				<!-- Email -->
				<div>
					<label for="Email"> E-mail : </label>
					<input disabled="true" type="email" name="email" id="email" value="<?php echo $email ; ?>"  required="">
				</div>

				<!-- Mot de passe -->
				<div>
					<label for="Tel"> PassWord : </label>
					<input disabled="true" type="PassWord" name="pwd" id="Pswd" placeholder="***********" minlength="5">
				</div>

				<!-- Boutton modif profil -->
				<a href="#" data-toggle="modal" data-target="#infos" class="btn btn-sm pull pull-left" style="color: aqua; margin: 20px 0; background-color: inherit;"> Modifier Mon profil </a>
			</div>
		</form>		
	</div>
</div>

<div class="modal " id="infos">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close btn btn-warning" data-dismiss="modal" style="background-color: red;"> X </button>
			</div>
			<div class="modal-divider"></div>
		<form enctype="multipart/form-data" method="post" action="traitementProfil.php" id="form">
			<div class="modal-body" style="background-color:rgba(0, 0, 0, 0.5);">
						<!-- Photo profil -->
						<div class="im">
							<input  type="file" id="photoo" name="photo" value="<?php echo $image ; ?>" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" onchange="loadFile(event)" style="height: 0;" />
			            <label for="photoo" ><img id="image" class="img-circle" src=" ../Images/<?php echo $image ; ?>" style="border: 5px solid green; height: 180px; width: 180px;"> </label> 
			      	</div>

						<!-- Noms -->
						<div>
							<label for="Nom"> Nom :   </label>
							<input  type="text" name="nom" id="Nom" value="<?php echo $nom ; ?>" required="" minlength="4"  maxlength="50" placeholder="Entrer votre Nom">
						</div>

						<!-- Prenoms -->
						<div>
							<label for="Prenom"> Prenom : </label>
							<input   type="text" name="prenom" id="Prenom" value="<?php echo $prenom ; ?>"  required="" minlength="4"  maxlength="50" placeholder="Entrer votre prenom">
						</div>

						<!-- Email -->
						<div>
							<label for="Email"> E-mail : </label>
							<input disabled="true" type="email" name="email" id="email" value="<?php echo $email ; ?>"  required="">
							<input  type="hidden" name="id"  value="<?php echo $id ; ?>">
						</div>

						<!-- Mot de passe -->
						<div>
							<label for="Tel"> PassWord : </label>
							<input  type="PassWord" name="pwd" id="Pswd" placeholder="***********" minlength="5">
						</div>
			</div>
			<div class="modal-footer">
				<input id="Clear" class="btn btn-danger " type="reset" value="effacer"> 
				<input id="Send" class="btn btn-success " type="submit" value="sauvegarder" style="margin: 0 40px;">
			</div>	
		</form>		
		</div>	
	</div>
</div>
<script type="text/javascript" src="../javascript/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
<script type="text/javascript">
	var profil = document.getElementById('pp');
	var image = document.getElementById('image');

    // previsualisation image dans formulaire
			var loadFile = function(event) {
      profil.src = URL.createObjectURL(event.target.files[0]);
    };

    var loadFile = function(event) {
      image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
</body>
</html>