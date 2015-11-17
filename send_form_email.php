<?php
if(isset($_POST['email'])) {
 
    $email_to = "madian.alabbas@gmail.com";
    $email_subject = "Contact Site";
 
    function died($error) {
        echo "Nous sommes désolé mais il y a des erreurs dans votre formulaire";
        echo "Voici les erreurs :<br /><br />";
        echo $error."<br /><br />";
        echo "Veuillez réessayer.<br /><br />";
        die();
    }
 
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||        
        !isset($_POST['comments'])) {
        died('Désolé, mais il y a des erreurs dans votre formulaire');       
    }
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name']; 
    $email_from = $_POST['email'];
    $comments = $_POST['comments'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Le mail semble être invalide.<br />';
  }
    $string_exp = "/^[A-Za-z\s.'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Le prénom semble être invalide<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Le nom semble être invalide..<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Les commentaires semblent être invalides.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Détails du formulaire.\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Prénom: ".clean_string($first_name)."\n";
    $email_message .= "Nom: ".clean_string($last_name)."\n";
    $email_message .= "Adresse mail: ".clean_string($email_from)."\n";   
    $email_message .= "Commentaires: ".clean_string($comments)."\n";


$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
sleep(2);
echo "<meta http-equiv='refresh' content=\"0; url=http://haubergiers.free.fr/madian/index.html\">";
?>
 
<?php
}
?>