<?php

/* showplayers.php - show people in a movie
 *
 * D Provine, 11 April 2019
 */

require_once('./Connect.php');
require_once('./DBfuncs.php');

$dbh = ConnectDB();

try {

  $query = " SELECT title, players.fname as real_first, " .
	         "        players.lname as real_last,  " .
    		 "	      roles.fname   as fake_first, " .
       "        roles.lname   as fake_last,   " .
       "        roles.movie_id as mid " .
			 " FROM movies " .
			 " JOIN roles USING (movie_id) " .
			 " JOIN players USING (player_id) " .
			 " WHERE players.player_id =:player_id" .
			 " ORDER BY players.lname, players.fname ";
			 
	$stmt = $dbh->prepare($query);
	
	$stmt->bindParam(':player_id', $_REQUEST['player_id']);
	
	$stmt->execute();
	
	// $stmt->debugDumpParams();
	
  $movie_list = $stmt->fetchAll(PDO::FETCH_OBJ);

	foreach ( $movie_list as $m ) {
    echo " <a href=\"showplayers.php?movie_id=$m->mid\" >$m->title, played as $m->fake_first $m->fake_last <br/></a> ";
	}
}
catch (PDOException $e)
{
	die("PDO Error: $e->getMessage()");
}

?>