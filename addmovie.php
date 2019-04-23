<?php

/* addmovie.php - add a movie to the database
 *
 * D Provine, 9 April 2019
 */
 
require_once('./Connect.php');
require_once('./DbFuncs.php');

$dbh = ConnectDB();

try {
	$inputTitle = $_REQUEST['movietitle'];

	$data = FetchArray($dbh, 'movies_new');
	$hasMovie = false;

	foreach($data as $d){
		if($d->title == $inputTitle){
			$hasMovie = true;
		}
	}
	if(!$hasMovie){
		$query = "INSERT INTO movies SET title=:title";
		
		$stmt = $dbh->prepare($query);
		
		$stmt->bindParam(':title', $inputTitle);
		
		$stmt->execute();
	}
}
catch(PDOException $e)
{
	die('PDO error inserting movie:' . $e->getMessage() );
}

header('Location: ./listmovies.php');

?>