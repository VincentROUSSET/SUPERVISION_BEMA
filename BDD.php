<?php

	try {
    $bdd = new PDO('mysql:host=localhost;dbname=mes_bema','root','');
	} 

	catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>