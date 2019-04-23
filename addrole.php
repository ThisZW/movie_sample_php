<?php

/* addrole.php - insert an entry to the database
 *
 * D Provine and his Posse, 16 April 2019
 */
require_once('Connect.php');
$dbh = ConnectDB();

try {
	$first = $_REQUEST['role_first'];
	$last = $_REQUEST['role_last'];
	$mid = $_REQUEST['movie_id'];
	$pid = $_REQUEST['player_id'];
	if(strlen($first) > 0 && strlen($last) > 0){
		$query = " INSERT INTO roles " .
				" SET movie_id=:movie_id, " .
				"     player_id=:player_id, " .
				"     fname=:role_first,    " .
				"     lname=:role_last      " ;
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':movie_id',   $mid);
		$stmt->bindParam(':player_id',  $pid);
		$stmt->bindParam(':role_first', $first);
		$stmt->bindParam(':role_last',  $last);
		$stmt->execute();
		$stmt = null;
	}
}
catch(PDOException $e)
{
    die ('PDO error adding role": ' . $e->getMessage() );
}

header('Location: ./showplayers.php?movie_id=' . $_REQUEST['movie_id']);

?>