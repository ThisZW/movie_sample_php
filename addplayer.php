<?php

/* addmovie.php - add a movie to the database
 *
 * D Provine, 9 April 2019
 */
 
require_once('./Connect.php');
require_once('./DbFuncs.php');

$dbh = ConnectDB();

try {
  $first = $_REQUEST['first'];
  $last = $_REQUEST['last'];

	$data = FetchArray($dbh, 'players');
	$hasPlayer = false;

	foreach($data as $d){
		if($d->fname == $first && $d->lname == $last){
			$hasPlayer= true;
		}
  }
  
	if(!$hasPlayer){
		$query = "INSERT INTO players SET fname=:fname, lname=:lname";
		
		$stmt = $dbh->prepare($query);
		
    $stmt->bindParam(':fname', $first);
    $stmt->bindParam(':lname', $last);
		
		$stmt->execute();
	}
}
catch(PDOException $e)
{
	die('PDO error inserting movie:' . $e->getMessage() );
}

header('Location: ./listplayers.php');

?>