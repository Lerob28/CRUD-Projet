<?php
	session_start(); 
?>

<?php 
	if ( isset($_POST) ) {
		$traitement = $_POST['N2'];
		$cible = $_POST['N1'];
		$niveau = 0;
		$data = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
		if ($traitement == 'consulter') {
			$dataReceive = $data->query('SELECT * FROM utilisateur');
    	    $i = 0;
            $User = array();
            while ( $donnees = $dataReceive->fetch() ) {
              if ($donnees['id'] == $cible) {
                 $User[$i] = $donnees;
                 break;
              }
              $i++;
            }
            $_SESSION['USE'] = $User[$i];
            header('location: profil.php');
		} else if ($traitement == 'supprimer') {
			$niveau = 3;
			$dataInsert = $data->prepare('UPDATE utilisateur SET niveau = ? WHERE id = ?');
  			$dataInsert->execute( array($niveau,$cible));
  			header('location: AdminAccount.php');
		  } else if ($traitement == 'desactiver') {
		  		$niveau = 2;
				$dataInsert = $data->prepare('UPDATE utilisateur SET niveau = ? WHERE id = ?');
  				$dataInsert->execute( array($niveau,$cible));
  				header('location: AdminAccount.php');
		    } else if ($traitement == 'activer') {
		    	$niveau = 1;
				$dataInsert = $data->prepare('UPDATE utilisateur SET niveau = ? WHERE id = ?');
  				$dataInsert->execute( array($niveau,$cible));
  				header('location: AdminAccount.php');
		      } else {
		      	// header('location: AdminAccount.php'); // erreur transmission du traitement a effectuer
		      }
	}
?>