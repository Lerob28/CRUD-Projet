<?php 
   // session_start();
?>

<?php

// if ( isset($_POST) ) {  // reception donnees et particulierement Email
//   $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
//   $response = $bdd->query('UPDATE utilisateur SET nom=$_POST[nom], prenom=$_POST[prenom] WHERE email= $_POST[email]');
//   if (!empty($_POST['pwd'])) {
//     $response = $bdd->query('UPDATE utilisateur SET pwd=$_POST[pwd], WHERE email= $_POST[email]');
//   }

// }else{
//   $_SESSION['message_error']=" Erreur Reception Des donnees !";
//   header('location: profil.php');  // redirection vers profil car  donnees pas recu
//   }
      
// if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) // verif et enregistrement image
// { 
//  $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
//  $response = $bdd->query('SELECT photo FROM utilisateur WHERE email= $_POST[email]');
//  if (($_FILES['photo']['size'] <= 3000000) AND ($response != $_FILES['photo']['name']))
//  {
//     $infosfichier = pathinfo($_FILES['photo']['name']);
//     $extension_upload = $infosfichier['extension'];
//     $extensions_autorisees = array('jpg', 'jpeg', 'png','JPEG','PNG','JPG');
//     if (in_array($extension_upload, $extensions_autorisees))
//     {
//        move_uploaded_file($_FILES['photo']['tmp_name'], '../Images/' . basename($_FILES['photo']['name']));
//        $statut_img="ok";
//     }else{
//        echo 'Extention de  l\'Image non-autorisee';
//        $statut_img="non";
//     }
//  }else{
//     echo ' votre Image est trop Volumineuse';
//     $statut_img="non";
//  }
// }else{
//   $_SESSION['message_error']=" Erreur lors de la transmission de l'image !";
//   header('location: profil.php');  // redirection vers profil car  donnees pas recu
//   }

// if ($statut_img =="ok") {  // insertion dans database
//    $dataInsert=$bdd->query('UPDATE utilisateur SET photo=$_FILES[photo][name], WHERE email= $_POST[email]');
//    header('location: UserAccount.php');  // recuperation parametre user et redirect vers account
// } else{
//      $_SESSION['message_error']=" Veillez respecter le format d'image autorise !";
//      header('location: profil.php');  // redirection vers profil car image incorrecte
//   }
     
// }
  print_r($_POST);
  print_r($_FILES);
?>

