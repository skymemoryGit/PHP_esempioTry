<?php
	//print_r(PDO::getAvailableDrivers());
	$dbname='yejianchen';	//forcatoalb
	$dbusername='webdb';	//webdb
	$dbpassword='webdb';		//webdb
	
	// Connessione al database
	//Nuova istanza della classe PDO
	try{
		$db=new PDO("pgsql:dbname=$dbname",$dbusername,$dbpassword);
		//Se ci sono errori li scrive
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connessione stronzo col DB OK";
		echo "passo dopo la stringa connessione";
    
    
    }
	catch (PDOException $e) {
		echo "Errore". $e->getMessage();
		}
		

		echo "dopo catch";

		
		$sql=$db->query("SELECT * FROM studente;");
		$sql->setFetchMode(PDO::FETCH_BOTH);
		echo "dopo istruzione";

	


		

?>