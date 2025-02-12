<?php
$adminEmail = 'antonio.domina@adextraitalia.it';
header("Location: contact2.html");

$userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$userMessage = '
  <html>
    <head>
      <title>Grazie per la tua richiesta</title>
    </head>
    <body>
      <h1>Grazie per averci contattato</h1>
      <p>La tua richiesta di informazioni è stata inoltrata. Ti risponderemo al più presto con i dettagli sull\'auto richiesta.</p>
      <p>Lo Staff</p>
    </body>
  </html>
';

$adminMessage = "
  <html>
    <head>
      <title>Richiesta auto dal sito web</title>
    </head>
    <body>
      <h1>Richiesta auto dal sito web</h1>
      <ul>
        <li>Nome: {$_POST['name']}</li>
        <li>Cognome: {$_POST['surname']}</li>
        <li>Email: {$_POST['email']}</li>
        <li>Auto richiesta: {$_POST['car_model']}</li>
        <li>Privacy: {$_POST['agree']}</li>
        <li>Newsletter: {$_POST['newsletter']}</li>
        <li>Marketing: {$_POST['marketing']}</li>
      </ul>
    </body>
  </html>
";

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$headers[] = 'From: CarVizio <adextra@adextraitalia.it>';

mail($userEmail, 'Richiesta auto ricevuta con successo', $userMessage, implode("\r\n", $headers));
mail($adminEmail, 'Nuova richiesta auto dal sito web', $adminMessage, implode("\r\n", $headers));

echo "Richiesta inviata con successo";
?>
