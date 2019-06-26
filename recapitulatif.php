<?php

session_start();
 if(!isset($_SESSION['numero'])){
	 header('location:index.html');
 }

$ext = $_SESSION['numero'];

if(isset($_POST['valider'])){
	$destinataire =  htmlspecialchars($_POST['destinataire']);
	$Cdestinataire =  htmlspecialchars($_POST['Cdestinataire']);
	$montant =  htmlspecialchars($_POST['montant']);
	$question =  htmlspecialchars($_POST['question']);
	$reponse =  htmlspecialchars($_POST['reponse']);
	
	
	if($destinataire != $Cdestinataire){
		//faire ce traitement sur la page home
		echo "Veuillez confirmer le numero du destinataire cliquez <a href='home.php'>ici</a>";
	}
	
}
?>
<style>
#wrapper{
	width:700px;
	margin:10 auto;
}
#bonjour{
	float:left;
}
#deconnexion{
	float:right;
}

#container {
	clear:both;
	background-color:#999;
	
}
#header{
	width:100%;	
}
.formulaire{
	margin:50 auto;
}

</style>
<div id="wrapper">
	<div id='header'>
		<div id='bonjour'> BONJOUR MR <?php echo $_SESSION['numero']; ?></div>
		<div id='deconnexion'> <a href ='deconnexion.php'> Se deconnecter</a></div>
	</div>
<div id='container'>

<table style = "margin:auto; background-color:#999">

<h3>RECAPITULATIF</h3>
<tr>
	<td>DESTINATAIRE :</td><td><?php echo $destinataire; ?></td>
	
</tr>
<tr>
	<td>DOIT RECEVOIR :</td><td><?php echo $montant; ?></td>
	
</tr>

<tr>
	<td>FRAIS DE TRANSFERT :</td><td><?php echo $frais = $montant * 0.2; ?></td>
</tr>

<tr>
	<td>TOTAL DU TRANSFERT :</td><td><?php echo $total = $montant+$frais; ?></td>
</tr>

<tr>
	<td>QUESTION :</td><td><?php echo $question; ?></td>
</tr>

<tr>
	<td>REPONSE :</td><td><?php echo  $reponse; ?></td>
	
</tr>
<td>
<form action ="payment.php" method="post" name="formulaire">
<input type="hidden" name="dest" value ="<?php echo $destinataire; ?>" >
<input type="hidden" name="montant" value ="<?php echo $montant; ?>" />
<input type="hidden" name="reponse" value ="<?php echo $reponse; ?>" />
<input type="hidden" name="question" value ="<?php echo $question; ?>" />

<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_9SyTNiX7yt6AfJHxoG1dsgGU"
        data-amount="<?php echo $total; ?>"
		data-name="CodingPassiveIncome"
        data-description="Widget"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="gnf">
		document.formulaire.submit();
</script>
</form>	 
</td>


</table>

</div>
</div>