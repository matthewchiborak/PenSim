<?php// This file is used to initialize the connection to the database, which needs to// be handled for every new page.
define ("DB_HOST", 'localhost'); // set database host
define ("DB_USER", 'root'); // set database user
define ("DB_PASS",''); // set database password
define ("DB_NAME",'pensim'); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't make connection.");
?>