<?php
	//print_r(PDO::getAvailableDrivers());
	$dbname='yejianchen';	
	$dbusername='webdb';	//webdb
	$dbpassword='webdb';		//webdb
	
	// Connessione al database
	//Nuova istanza della classe PDO
	try{
		$db=new PDO("pgsql:dbname=$dbname",$dbusername,$dbpassword);
		//Se ci sono errori li scrive
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connessione col DB OK";
    
    
    }
	catch (PDOException $e) {
		echo "Errore". $e->getMessage();
    }

		
		/*
		$prova= $db->query("SELECT matricola FROM studente");
		echo 	$prova;
    echo "passato";
    */


		<?php
    ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
    error_reporting(E_ALL | E_STRICT);
    
    $sql=$db->query("SELECT * FROM studenti;");
    $sql->setFetchMode(PDO::FETCH_BOTH);
 		?>
    

?>