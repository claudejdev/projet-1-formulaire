<!-- http://www.freecontactform.com/email_form.php -->

<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "claudejanssen.pro@google.com";
    $email_subject = "BeCode - Projet 1 Formulaire";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(
        !isset($_POST['gender']) ||
        !isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['country']) ||
        !isset($_POST['email']) ||
        !isset($_POST['topic']) ||
        !isset($_POST['message'])) {
        died('Oups, il semble y avoir un soucis avec les données que tu as envoyées.');
    }



    $your_gender = $_POST['gender']; // required
    $first_name = $_POST['firstname']; // required
    $last_name = $_POST['lastname']; // required
    $your_country = $_POST['country']; // required
    $email_from = $_POST['email']; // not required
    $your_topic = $_POST['topic']; // required
    $your_message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($your_message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Genre : ".clean_string($your_gender)."\n";
    $email_message .= "Prénom : ".clean_string($first_name)."\n";
    $email_message .= "Nom : ".clean_string($last_name)."\n";
    $email_message .= "Pays : ".clean_string($your_country)."\n";
    $email_message .= "Email : ".clean_string($email_from)."\n";
    $email_message .= "Sujet : ".clean_string($your_topic)."\n";
    $email_message .= "Message : ".clean_string($your_message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Merci de nous avoir écrit. On te répond très vite.

<?php

}
?>
