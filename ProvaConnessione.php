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

		$lstStand=$db->query("SELECT * from studente;");
 ?>

 <html>
	<body>
		<div style="text-align:center;">
			<img src="img/reUNIonPD.png" /><br/>
			<fieldset>			
			<?php
				while($stand=$lstStand->fetch()){
					$sql=$db->query("SELECT nome, cognome FROM studente;"); ?>

					<table class="vis" width="75%" border="1" align="center" >
					<caption><h2>VOLONTARI STAND "<?php echo $stand["nome"]; ?>"</h2></caption>
					<?php
					$volo=$sql->fetch();
					if(!isset($volo["nome"]))
							echo "<tr><td>Nessun volontario ancora inserito</td></tr></table>";
					else{
						?> 
						<tr><th>Nome</th><th>Cognome</th></tr>
						<?php				
						do {
								echo "<tr><td>".$volo["nome"]."</td><td>".$volo["cognome"]."</td></tr>";
						}while($volo=$sql->fetch());
						echo "</table>";
					}
		    	}
			?>
			</fieldset>
			<br/><a href="index.php"><input type="button" value="TORNA INDIETRO"/></a><br/>
		</div>
		
	</body>
</html>


<?php
		
		echo "_____dopo istruzione";

	


		

?>