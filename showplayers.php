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
					 "				players.player_id as pid, " . 
    		 "	      roles.fname   as fake_first, " .
			 "        roles.lname   as fake_last   " .
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
		echo "<a href=\"showmovies.php?player_id=$player->pid\">$player->real_first $player->real_last</a> as " .
		     "$player->fake_first $player->fake_last <br /> \n";
	}

	$stmt2 = $dbh->prepare("SELECT * FROM players");
	$stmt2->execute();
	$players = $stmt2->fetchAll(PDO::FETCH_OBJ);

}
catch (PDOException $e)
{
	die("PDO Error: $e->getMessage()");
}

?>

<form action="addrole.php">
	<input hidden value="<?php echo $_REQUEST['movie_id']?>" name="movie_id">
	<select name="player_id">
		<?php foreach($players as $p): ?>
			<option value="<?php echo $p->player_id;?>">
				<?php echo "$p->fname $p->lname" ;?>
			</option> 
		<?php endforeach ?>
	</select>
	<input name="role_first">
	<input name="role_last">
	<input type="submit" />
</form>
