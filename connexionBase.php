<?php
$hote = '172.31.29.27';
$utilisateur = 'utilmysql';
$mdp ='Password2021!';
$base = 'contacts';

function BDD_Connect() {
    global $hote, $utilisateur, $mdp, $base;
    static $connect = null;
    if ($connect === null) {
		$connect = mysqli_connect($hote, $utilisateur, $mdp, $base);
    }
    return $connect;
  }
?>
