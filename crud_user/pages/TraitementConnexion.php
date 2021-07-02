<?php 
 session_start();
   
 if ( isset($_POST['Pswd']) AND isset($_POST['email']) ) { 
    $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $response = $bdd->query('SELECT * FROM utilisateur WHERE niveau != 5');
    $i = 0;
    $allUser = array();
    $_SESSION['USER'] ='';
    $_SESSION['errormail'] ='';
    $_SESSION['errorpass'] ='';
    while ( $donnees = $response->fetch() ) {
      $allUser[$i] = $donnees;
      if ( ($allUser[$i]['email'] == $_POST['email']) AND ($allUser[$i]['pwd'] == $_POST['Pswd']) ) { 
        $_SESSION['EtatCompte'] ='';
        if ($allUser[$i]['niveau'] == 1 OR $allUser[$i]['niveau'] == 2) {
          $_SESSION['USER'] = $allUser[$i];
          header('location: UserAccount.php');
          break;
          // echo "access autorise";
        } 
        if ($allUser[$i]['niveau'] == 3) {
          $_SESSION['EtatCompte'] = " compte Introuvable ";
          header('location: connexion.php');
        } 
      }
      $i++;
    }
    if (empty($_SESSION['USER']) AND empty($_SESSION['EtatCompte'])) {
      for ( $i=0; $i<count($allUser) ; $i++ ) { 
        if ( $allUser[$i]['email'] != $_POST['email'] ) {
          $_SESSION['errormail'] = " verifier votre adresse mail !";
        } else {
            $_SESSION['errormail'] ='';
            break;
          }
      } 
      
      for ( $i=0; $i<count($allUser) ; $i++ ) { 
        if ( $allUser[$i]['pwd'] != $_POST['Pswd'] ) {
          $_SESSION['errorpass'] = " Mot de passe incorrect !";
        } else {
            $_SESSION['errorpass'] ='';
            break;
          }
      }
     header('location: connexion.php');
    }
      // echo " access non autorise";
 } 

?>