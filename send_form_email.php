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
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="formulaire_style.css" charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FormSvTechnique</title>
</head>
<body>
<div id="contact_form">
<p>Cher <?php echo $first_name ?>,</p>
<p>Merci de nous avoir écrit.<br />On te répond très vite.</p>
<p>Hackers Poulette</p></p>
<p>
  <!-- TODO : inverser le sens de la flèche ou trouver un autre icône -->
  <button form="contactform"  name="submit_button" type="submit" value="Submit">
    <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
      <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
    </svg>
    <small>Envoi</small>
  </button>
</p>
<p>
  <img id="logo" src="images/hackers-poulette-logo.png" alt="Logo de Hackers Poulette ™"/>
</p>
</div>

<small class='website'>Cette page répond aux normes d'accessibilité <a href='http://www.w3.org' target='_blank'><abbr title="World Wide Web Consortium">W3C</abbr></a></small>
</body>
</html>

<?php

}
?>
