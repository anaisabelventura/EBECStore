<?php

	/*ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);*/

	if(isset($connection)){
		pg_close($connection);
	}

	$user = "best";
	$host = "db.tecnico.ulisboa.pt";
	$port = 5432;
	$password = "tsva2535";
	$dbname = $user;

	//Database Selection: In MySQL, you have to separately specify the name of the database you wish to connect to,
	//while in PostgreSQL it is built into pg_connect()'s connection string.
	$connection = pg_connect("host=$host user=$user port=$port password=$password dbname=$dbname");

	if ( !$connection ) {
		echo "Deu merda 1";
		$_SESSION['servidor_manutencao'] = 'Servidor em manutenção, tenta registar-te mais tarde';
		echo "Deu merda 2";
		die(pg_last_error());
		echo "Deu merda 3";
		header("Location: index.php");
		die();
	}

	/* if($connection) {
			echo 'connected';
	 } else {
			 echo 'there has been an error connecting';
	 }*/

?>
