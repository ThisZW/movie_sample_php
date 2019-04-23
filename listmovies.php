<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>
    List Of Movies
  </title>
  <meta charset="utf-8" />
  <meta name="Author" content="Darren Provine" />
  <meta name="generator" content="emacs" />
  <link rel="shortcut icon" href="/~kilroy/Images/KilroyBrick.png" />
  <style>
    a { text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>

<body>

<ol>

<?php

/* listmovies.php - list the people in the database
 *
 * D Provine, 9 April 2019
 */
 
require_once('./Connect.php');
require_once('./DBfuncs.php');

$dbh = ConnectDB();

$list = FetchArray($dbh, 'movies');

$index = 1;
foreach ( $list as $movie ) {
  
  echo "
  <a href=\"showplayers.php?movie_id=$index\"/>
    <li> $movie->title </li> 
    </a>\n ";
  $index++;
}

echo "</ol>\n";

?>

<form action="addmovie.php">
	<input type="text" name="movietitle" />
	<input type="submit" />
</form>

</p>

<footer style="border-top: 1px solid blue">
 <a href="http://elvis.rowan.edu/~kilroy/" 
    title="Link to my home page">
    D. Provine
 </a>

<span style="float: right;">
<a href="http://validator.w3.org/check/referer">HTML5</a> /
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
    CSS3 </a>
</span>
</footer>

</body>
</html>
