<?php

/* deleterole.php - insert an entry to the database
 *
 * D Provine and his Posse, 16 April 2019
 */
require_once('Connect.php');
$dbh = ConnectDB();

try {
    $query = " DELETE FROM roles " .
			 " WHERE role_id=:role_id ";
    $stmt = $dbh->prepare($query);
	$stmt->bindParam(':role_id',   $_REQUEST['role_id']);
    $stmt->execute();
    $stmt = null;
}
catch(PDOException $e)
{
    die ('PDO error adding role": ' . $e->getMessage() );
}

header('Location: ./fixmovie.php?movie_id=' . $_REQUEST['movie_id']);

?>