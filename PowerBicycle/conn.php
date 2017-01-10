<?php
	try {
		$dbh = new PDO("sqlsrv:Server=localhost; DataBase=go", "sa", "getmepower");
	} catch (PDOException $e) {
		echo "Failed to get DB handle: " . $e -> getMessage() . "\n";
		exit ;
	}

?>
