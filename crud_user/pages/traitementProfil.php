<?php 
   session_start();
   if (isset($_SESSION['USE'])) {
        $nom = $_SESSION['USE']['nom'];
        $prenom = $_SESSION['USE']['prenom'];
        $email = $_SESSION['USE']['email'];
        $pswd = $_SESSION['USE']['pwd'];
        $image = $_SESSION['USE']['photo'];
        $id = $_SESSION['USE']['id'];
    } else {
        $nom = $_SESSION['USER']['nom'];
        $prenom = $_SESSION['USER']['prenom'];
        $email = $_SESSION['USER']['email'];
        $pswd = $_SESSION['USER']['pwd'];
        $image = $_SESSION['USER']['photo'];
        $id = $_SESSION['USER']['id'];
    }
?>

<?php

if ( isset($_POST) ) {  // reception donnees 
  $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $id = $_POST['id'];
  $dataInsert = $bdd->prepare('UPDATE utilisateur SET nom = ?, prenom = ? WHERE id = ?');
  $dataInsert->execute( array($nom,$prenom,$id));
  if (!empty($_POST['pwd'])) {
    $pswd = $_POST['pwd'];
    $dataInsert = $bdd->prepare('UPDATE utilisateur SET pwd = ? WHERE id = ?');
    $dataInsert->execute( array($pswd,$id));
  }
}   else{
        $_SESSION['message_error']=" Erreur Reception Des donnees !";
        header('location: profil.php');  // redirection vers profil car  donnees pas recu
    }
      
if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) // verif et enregistrement image
{ 
    $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
    $id = $_POST['id'];
    $response = $bdd->prepare('SELECT photo FROM utilisateur WHERE id = ?');
    $response->execute( array($id));
    if (($_FILES['photo']['size'] <= 3000000) AND ($_SESSION['USE']['photo'] != $_FILES['photo']['name']))
    {
       $infosfichier = pathinfo($_FILES['photo']['name']);
       $extension_upload = $infosfichier['extension'];
       $extensions_autorisees = array('jpg', 'jpeg', 'png','JPEG','PNG','JPG');
       if (in_array($extension_upload, $extensions_autorisees))
       {
          move_uploaded_file($_FILES['photo']['tmp_name'], '../Images/' . basename($_FILES['photo']['name']));
          $statut_img="ok";
          echo " image update";
       }else{
           $_SESSION['message_error']= "Extention de  l'image non-autorisee";
          $statut_img="non";
       }
    }else{
        $_SESSION['message_error']= " votre Image est trop Volumineuse";
       $statut_img="non";
    }
}else{
  $_SESSION['message_error']=" Erreur lors de la transmission de l'image !";
  echo "Erreur reception image";
  header('location: profil.php');  // redirection vers profil car  donnees pas recu
  }

if ($statut_img =="ok") {  // insertion dans database
   $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
   $pnom= $_FILES['photo']['name'];
   $id = $_POST['id'];
   $dataInsert=$bdd->prepare('UPDATE utilisateur SET photo = ? WHERE id = ?');
   $dataInsert->execute( array($pnom,$id));
   $response = $bdd->query('SELECT * FROM utilisateur');
      $i = 0;
      $allUser = array();
      while ( $donnees = $response->fetch() ) {
         if ($donnees['id'] == $id) {
           $allUser[$i] = $donnees;
           break;
         }
         $i++;
    }
    $_SESSION['USE'] = $allUser[$i];
   header('location: profil.php');  // recuperation parametre user et redirect vers account
} else{
     $_SESSION['message_error']=" Veillez respecter le format d'image autorise !";
     header('location: profil.php');  // redirection vers profil car image incorrecte
  }
     
?>

