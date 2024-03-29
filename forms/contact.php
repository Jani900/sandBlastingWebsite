<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'admin@completeblastsolutions.co.nz';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
  


  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  $envEmailHost = getenv('ENV_EMAIL_HOST');
  $envEmailUserName = getenv('ENV_EMAIL_USERNAME');
  $envEmailPassword = getenv('ENV_EMAIL_PASSWORD');
  $envEmailPort = getenv('ENV_EMAIL_PORT');
  

  error_log($envEmailHost);
  error_log( getenv('HOSTNAME'));
  
  $contact->smtp = array(
    'host' => $envEmailHost,
    'username' => $envEmailUserName,
    'password' => $envEmailPassword,
    'port' => $envEmailPort
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
