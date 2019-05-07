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
    
    $sql=$db->query("SELECT * FROM studente;");
    $sql->setFetchMode(PDO::FETCH_BOTH);
		 ?>
		 
		 <html>
		 <body>
			 <div style="text-align:center;">
				 //<img src="img/reUNIonPD.png" /><br/>
				 <fieldset>
				 <table class="vis" width="75%" border="1" align="center">
				 <caption><h2>LISTA STAND PRESENTI</h2></caption>
				 <tr><th>Nome</th><th>Descrizione</th><th>Responsabile</th>
				 <?php
					 while($row=$sql->fetch()){
							 $lstStand=$row;
						 echo '<tr><td>'.$row['matricola'].'</td><td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td>';
						 }
				 ?>
				 </table>
				 </fieldset>
				 //<br/><a href="index.php"><input type="button" value="TORNA INDIETRO"/></a><br/>
			 </div>
			 
		 </body>
	 </html>

?>