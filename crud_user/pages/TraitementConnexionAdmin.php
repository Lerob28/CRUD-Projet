<?php 
  session_start();
   
 if ( isset($_POST['Pswd']) AND isset($_POST['email']) ) { 
    $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $response = $bdd->query('SELECT * FROM utilisateur WHERE niveau=5');
    $i = 0;
    $allUser = array();
    $_SESSION['USER'] = '';
    $_SESSION['errormail'] = '';
    $_SESSION['errorpass'] = '';
    while ( $donnees = $response->fetch() ) {
      $allUser[$i] = $donnees;
      if ( ($allUser[$i]['email'] == $_POST['email']) AND ($allUser[$i]['pwd'] == $_POST['Pswd']) ) { 
        if ($allUser[$i]['niveau'] == 5) {
          $_SESSION['USER'] = $allUser[$i];
          header('location: AdminAccount.php');
          break;
        } 
      }
      $i++;
    }
    if (empty($_SESSION['USER'])) {
      for ( $i=0; $i<count($allUser) ; $i++ ) { 
        if ( $allUser[$i]['email'] != $_POST['email'] ) {
          $_SESSION['errormail'] = " verifier votre adresse mail !";
        } else {
            $_SESSION['errormail'] = '';
            break;
          }
      } 
      
      for ( $i=0; $i<count($allUser) ; $i++ ) { 
        if ( $allUser[$i]['pwd'] != $_POST['Pswd'] ) {
          $_SESSION['errorpass'] = " Mot de passe incorrect !";
        } else {
            $_SESSION['errorpass'] = '';
            break;
          }
      }
     header('location: ConnexionAdmin.php');
    }
  } 

?>