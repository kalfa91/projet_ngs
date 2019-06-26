<?php
session_start();
 require_once('modele.php');
 
 if(!isset($_SESSION['numero'])){
	 header('location:index.html');
 }
 
 $clientId = $_SESSION['numero'];
 $modele = new Modele();
 $statut = "EN COURS";
 $transfertEnCours = $modele->afficherTransfert($clientId,$statut);
 
//var_dump($transfertEnCours);
$statut1 = "TERMINE";
 $transfertTermines = $modele->afficherTransfert($clientId, $statut1);
 

?>



<html>
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
	
}
#header{
	background:#aaa;
	width:100%;	
}
.formulaire{
	margin:50 auto;
}
.espace{
	height:50px;
	
}
#boutton{
	float:right;
	clear:both;
}
.couleur{
	background:#aaa;
}

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<div id="wrapper">
	<div id='header' >		
		<div id='bonjour'> BONJOUR MR <?php echo $_SESSION['numero'];?></div>
		<div id='deconnexion'> <a href ='deconnexion.php'> Se deconnecter</a></div>
	</div>
	<div class="espace"></div>
	
	<div id='container'>
	
	<button type="button" id ="boutton"class="btn btn-primary" data-toggle="collapse" data-target="#demo">+</button>
		<div id="demo" class="collapse">
			<form method="post" action ="recapitulatif.php" class='formulaire'>
		
		<table>
			<thead>
			<tr>
				<th><h3 class='texte'>NEW TRANSFERT</h3></th>
			</tr>
			</thead>
			
			<tbody>
			<tr>
			
				<td>NUMERO DESTINATAIRE :</td><td><input type ="text" placeholder ="numero du destinataire" name ="destinataire" class="form-control" required/> </td>
			</tr>
			<tr>
				<td>CONFIRMER NUMERO DESTINATAIRE :</td><td><input type ="text" placeholder ="confirmer numero du destinataire" name ="Cdestinataire" class="form-control" required/> </td>
			</tr>
			<tr>
				<td>MONTANT	:</td><td><input type ="text" placeholder ="Montant" name ="montant" class="form-control" required/></td>
			</tr>
			<tr>
				<td>QUESTION:</td><td><input type ="text" placeholder ="question" name ="question" class="form-control" required/></td>
			</tr>
			<tr>
				<td>REPONSE:</td><td><input type ="password" placeholder ="Reponse" name ="reponse" class="form-control" required/></td>
			</tr>
			<td><input type= "submit" name="valider" value ="SUIVANT" class="btn btn-primary"/></td>
		</tbody>
		</form>
		</table>
		
		
		
		
	</div>
</div>
		
	<div class="espace"></div>
	<div id="operations">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#transfertEnCours">Transferts en cours</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#transfertTermines">Transferts termines</a>
			</li>
  </ul>
		
		
	<div class="tab-content">
		<div id="transfertEnCours" class="container tab-pane active"><br>
			<h3>TRANSFERTS EN COURS</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Payment ID</th>
							<th>Destinataire</th>
							<th>Montant</th>
							<th>Frais</th>
							<th>Total Payer</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						
					
						<?php 
						/*if(empty($transfertEnCours)){
							echo "aucun transfert en cours";
						}else{*/
							while($data = $transfertEnCours->fetch()){
							//foreach($transfertEnCours as $transfertEnCour): ?>
							<tr>
								<td><?php print_r ($data['idPayment']); ?></td>
								<td><?php print_r ($data['destinataire']); ?></td>
								<td><?php print_r ($data['montant']); ?></td>
								<td><?php print_r ($data['frais']); ?></td>
								<td><?php print_r ($data['total']); ?></td>
								<td><?php print_r ($data['dateTransfert']); ?></td>
								
							</tr>
						<?php //endforeach;
						} ?>
					</tbody>
				</table>
		</div>
		<div id="transfertTermines" class="container tab-pane fade"><br>
			<h3>TRANSFERTS TERMINES</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Payment ID</th>
							<th>Destinataire</th>
							<th>Montant</th>
							<th>Frais</th>
							<th>Total Payer</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						while($data = $transfertTermines->fetch()){ ?>
							<tr>
								<td><?php print_r ($data['idPayment']); ?></td>
								<td><?php print_r ($data['destinataire']); ?></td>
								<td><?php print_r ($data['montant']); ?></td>
								<td><?php print_r ($data['frais']); ?></td>
								<td><?php print_r ($data['total']); ?></td>
								<td><?php print_r ($data['dateTransfert']); ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
		</div>
</div>
		
	</div>
	

</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>





