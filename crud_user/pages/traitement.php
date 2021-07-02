<?php 
   session_start();
 ?>

<?php
   
   if ( isset($_POST) AND isset($_POST['email']) ) {  // reception donnees et particulierement Email
      $bdd = new PDO('mysql:host=localhost;dbname=users','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); // connect database
      $response = $bdd->query('SELECT * FROM utilisateur');
      $i = 0;
      $allUser = array();
      while ( $donnees = $response->fetch() ) {
         $allUser[$i] = $donnees;
         if ( $allUser[$i]['email']==$_POST['email'] ) {
            $_SESSION['message_error'] = "cet adresse mail existe deja veillez utiliser une autre !";
            header('location: inscription.php');  // utilisateur existant redirection formulaire inscription
         }
         $i++;
      }
      
      if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) //verif et enregistrement image
      {
         if ($_FILES['photo']['size'] <= 3000000)
         {
            $infosfichier = pathinfo($_FILES['photo']['name']);
            // print_r($infosfichier);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png','JPEG','PNG','JPG');
            if (in_array($extension_upload, $extensions_autorisees))
            {
               move_uploaded_file($_FILES['photo']['tmp_name'], '../Images/' . basename($_FILES['photo']['name']));
               $statut_img="ok";
            }else{
               echo 'Extention de  l\'Image non-autorisee';
               $statut_img="non";
            }
         }else{
            echo ' votre Image est trop Volumineuse';
            $statut_img="non";
         }
      }

      if ($statut_img=="ok") {  // insertion dans database
         $dataInsert=$bdd->prepare('INSERT into utilisateur (nom,prenom,email,pwd,photo,niveau) VALUES(?,?,?,?,?,?)');
         $dataInsert->execute( array($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pwd'],$_FILES['photo']['name'],$_POST['niveau']));
         $allUser=array();
         $j=0;
         $response=$bdd->query('SELECT * FROM utilisateur');
         while ($donnees =$response->fetch()) {
            $allUser[$j]=$donnees;
            $j++;
         }
         for ($i=0; $i <$j ; $i++) { 
            if ($allUser[$i]['email']==$_POST['email']) {
               $_SESSION['USER']=$allUser[$i];
               header('location: UserAccount.php');  // recuperation parametre user et redirect vers account
            }
         }
         
      }else{
         $_SESSION['message_error']=" Veillez respecter le format d'image autorise !";
         header('location: inscription.php');  // redirection vers inscription car image incorrecte
      }
           
   }else{
      header('location: inscription.php');  // redirection vers inscription car  donnees pas recu
  }
  
?>