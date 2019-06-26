<?php
  require_once('C:/Windows/System32/vendor/autoload.php');
  require_once('transfert.php');
  session_start();
 if(!isset($_SESSION['numero'])){
	 header('location:index.html');
 }

$exp = $_SESSION['numero'];
$email = $_SESSION['email'];
 \Stripe\Stripe::setApiKey('sk_test_RqlgWVBPTtPZ4RZWgSvpRSK8');

  //echo $_POST['dest'];
  //echo $_POST['question'];
 
 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $dest = $POST['dest'];
 $montant = $POST['montant'];
 $question = $POST['question'];
 $reponse = $POST['reponse']; 
 $token = $POST['stripeToken'];
 

 
 $transfert = new Transfert($exp,$dest,$question,$reponse,$montant);
echo $transfert->getDestinataire();
// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $transfert->getTotal(),
  "currency" => "gnf",
  "description" => "Transfert argent ".$transfert->getDestinataire(),
  "customer" => $customer->id
));

//echo $customer->id;
//echo $charge->id;

$transfert->transfertEnCours($charge->id);
header('location:success.php');