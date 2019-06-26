<?php
session_start();
 if(!isset($_SESSION['numero'])){
	 header('location:index.html');
 }
header('location:home.php');