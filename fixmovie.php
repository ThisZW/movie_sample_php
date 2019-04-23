<?php

/* showplayers.php - show people in a movie
 *
 * D Provine, 11 April 2019
 */

require_once('./Connect.php');
require_once('./DBfuncs.php');

$dbh = ConnectDB();

try {
	$query = " SELECT players.fname as real_first, " .
	         "        players.lname as real_last,  " .
    		 "	      roles.fname   as fake_first, " .
			 "        roles.lname   as fake_last,  " .
			 "        roles.role_id " . 
			 " FROM movies " .
			 " JOIN roles USING (movie_id) " .
			 " JOIN players USING (player_id) " .
			 " WHERE movies.movie_id=:movie_id " .
			 " ORDER BY players.lname, players.fname ";
			 
	$stmt = $dbh->prepare($query);
	
	$stmt->bindParam(':movie_id', $_REQUEST['movie_id']);
	
	$stmt->execute();
	
	// $stmt->debugDumpParams();
	
	$player_list = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	$stmt = null;
	
	foreach ( $player_list as $player ) {
		echo "<a href='./deleterole.php?role_id=$player->role_id" .
		     "&amp;movie_id=" . $_REQUEST['movie_id'] . "'>" .
			 "delete </a>\n";
		echo "$player->real_first $player->real_last as " .
		     "$player->fake_first $player->fake_last <br /> \n";
	}
}
catch (PDOException $e)
{
	die("PDO Error: $e->getMessage()");
}

?>