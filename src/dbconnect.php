<?php


function connectToDB(){
/* connect to database */
$dbhost = "acadmysql.duc.auburn.edu";
$dbuser = "au_username";
$dbpass = "password";
$dbname = "bookstore";
return $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}
?>