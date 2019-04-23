<form action="addrole.php">

<select name='movie_id'>

<?php

/* newrole.php - list the people in the database
 *
 * D Provine, 9 April 2019
 */
 
require_once('./Connect.php');
require_once('./DBfuncs.php');

$dbh = ConnectDB();

$list = FetchArray($dbh, 'movies_new');

foreach ( $list as $movie ) {
	echo " <option value='$movie->movie_id'> $movie->title </option> \n";
}

echo "</select>\n";

echo "<select name='player_id'>\n";

$player_list = FetchArray($dbh, 'players');

foreach ( $player_list as $player ) {
	echo " <option value='$player->player_id'> " .
	     " $player->fname $player->lname </option> \n";
}
echo "</select>\n";
?>

	<input type="text" name="role_first" />
	<input type="text" name="role_last" />

	<input type="submit" />
</form>