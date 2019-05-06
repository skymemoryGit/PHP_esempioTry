<?php
	//print_r(PDO::getAvailableDrivers());
	$dbname='yejianchen';	
	$dbusername='yejianchen';	//webdb
	$dbpassword='Random1996!';		//webdb
	
	// Connessione al database
	//Nuova istanza della classe PDO
	try{
		$db=new PDO("pgsql:dbname=$dbname",$dbusername,$dbpassword);
		//Se ci sono errori li scrive
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connessione col DB OK";
    
    
    
        //select all data php 
    $query = "SELECT nome, cognome, matricola FROM studente";
    $stmt = $db-> prepare( $query );
    $stmt->execute();
  
    // this is how to get number of rows returned
    $num = $stmt->rowCount();
  
//  check if more than 0 record found

    echo "porco D";
    print $num;
    if($num>0){
  
    //start table
    echo "<table border='1'>";
  
        //creating our table heading
        echo "<tr>";
            echo "<th>1</th>";
            echo "<th>2</th>";
            echo "<th>3</th>";
            
        echo "</tr>";
  
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
  
            //creating new table row per record
            echo "<tr>";
                echo "<td>{$nome}</td>";
                echo "<td>{$cognome}</td>";
                echo "<td>{$matricola}</td>";
            
                    //we will use this links on next part of this post
                    echo "<a href='edit.php?id={$id}'>Edit</a>";
                    echo " / ";
                    //we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
  
    //end table
    echo "</table>";
  
}
  
//if no records found
else{
    echo "No records found. passato da num==0";
}








    
    }
	catch (PDOException $e) {
		echo "Errore". $e->getMessage();
    }
    


   
   
    





?>