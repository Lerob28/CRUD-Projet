<?php 
	include('headerProfilManage.php');
 ?>
<div class="row">
	<h3 class="form2 col-md-offset-3 col-md-6"> Mes Informations Personelles  </h3>
	<div class=" form1 col-md-offset-3 col-md-6">
		<form enctype="multipart/form-data" method="post" action="traitementProfil.php" id="form">
			<div class="col-md-6" style="line-height: 30px;">

					<!-- Photo profil -->
					<div class="im">
						<input type="file" id="photo" name="photo" value="<?php echo $image ; ?>" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" onchange="loadFile(event)" required="" style="height: 0;" />
            <label for="photo" id="ppp"><img id="pp" class="img-circle" src=" ../Images/<?php echo $image ; ?>" style="border: 5px solid green;"> </label> 
      		</div>

					<!-- Noms -->
					<div>
						<label for="Nom"> Nom :   </label>
						<input type="text" name="nom" id="Nom" value="<?php echo $nom ; ?>" required="" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" placeholder="Entrer votre Nom">
					</div>

					<!-- Prenoms -->
					<div>
						<label for="Prenom"> Prenom : </label>
						<input  type="text" name="prenom" id="Prenom" value="<?php echo $prenom ; ?>"  required="" minlength="4" pattern="^[A-Za-z0-9_.]+${3,20}" maxlength="50" placeholder="Entrer votre prenom">
					</div>

					<!-- Email -->
					<div>
						<label for="Email"> E-mail : </label>
						<input type="email" name="email" id="email" value="<?php echo $email ; ?>"  required="">
					</div>

					<!-- Mot de passe -->
					<div>
						<label for="Tel"> PassWord : </label>
						<input type="PassWord" name="pwd" id="Pswd" placeholder="***********" minlength="5">
					</div>
					<a href="#" id="modif"><button style="background-color: inherit; color: aqua; margin-top: 30px;"> modifier mon profil </button></a>
			</div>
			<div class="col-md-6" style="position: absolute; bottom: 0; right: 0;">
					<div class="text-center" style="color: rgb(255,6,6); padding-bottom: 130px;">
						 <b>
						 	<?php 
							 	if (!empty($_SESSION['message_error'])){
							 		echo $_SESSION['message_error'];
							 	}
						  ?> 
						 </b>
					</div>
					<a href=""> <input id="Clear" type="reset" value="annuler" style=" width: 70px; margin-left: 150px; color: red;"> </a> 
					<a href=""> <input id="Send"  type="submit" value="sauvegarder" style=" width: 100px; position: absolute; bottom: 0; right: 0; color: green;"> </a>
			</div>
		</form>		
	</div>
</div>
		
</div>
</body>
	<script type="text/javascript" src="../javascript/jquery.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript">
		var formulaire = document.getElementById('form');
		var modif = document.getElementById('modif');
		var input = document.getElementsByTagName('input');
		var Send = document.getElementById('Send'); 
		var profil = document.getElementById('pp');
		var BlocPhoto = document.getElementById('ppp');
		var source = input[0].getAttribute('src');
		console.log(BlocPhoto);
		console.log(profil);
		

    // previsualisation image dans formulaire
			var loadFile = function(event) {
      profil.src = URL.createObjectURL(event.target.files[0]);
    };


		// Detection Appui Boutton Send
		Send.addEventListener('click' , function(){
			input[3].removeAttribute('disabled');
			formulaire.submit();
		});


		// Evenement sur nom
		input[1].addEventListener('blur' , function(){
			
		})

		// Evenement sur prenom
		input[2].addEventListener('blur' , function(){
			
		})


		// Evenement sur password
		input[4].addEventListener('blur' , function(){
			
		});

		//Evenement sur annuler
		input[5].addEventListener('click', function(){
			BlocPhoto.removeChild(BlocPhoto.lastElementChild);
			BlocPhoto.appendChild(profil);
			console.log('ici BlocPhoto'+BlocPhoto);
		});

		// Evenement sur image
		input[0].addEventListener('change' , function(){
			
		});

		// desactivation modification profil
		function Masque() {
			for (var i = input.length - 3; i >= 0; i--) {
					input[i].setAttribute('disabled','true');
				}
			input[5].style.display= 'none';	
			input[6].style.display= 'none';	
		}
		Masque();

		// activation modification profil
		modif.addEventListener('click' , function(){
			for (var i = input.length - 3; i >= 0; i--) {
					if (i==3) {
						continue;
					} else{
						input[i].removeAttribute('disabled');
					}
				}
			input[5].style.display= 'block';	
			input[6].style.display= 'block';	
		});
	</script>
	<?php 
		unset($_SESSION['message_error']);
	?>
</html>