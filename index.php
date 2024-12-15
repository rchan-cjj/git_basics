<?php

$db_host = "localhost";
$db_name = "website";
$db_user = "";
$db_password = "";

// Open database connection
$dbconn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_password")
    or die('Could not connect: ' . pg_last_error());

// Authenticate user
$username = $_POST["username"];
$password = $_POST["password"];

$result = pg_prepare($dbconn, "prepared_query", 'SELECT name FROM users WHERE name = $1 AND password = $2');
$result = pg_execute($dbconn, "prepared_query", array($username, $password));

if ($result) {
  session_start();
  $_SESSION["username"]=$pg_fetch_row($result)[0];
}

// Close database connection
pg_close($dbconn);

?>
<!DOCTYPE html>
<html>
  <body>
    <h1>Login to the admin portal</h1>
    <form method="POST">
      <!-- HTML comments are sent to users -->  
      <!-- CTF{It starts with one, one thing, I don't know why} -->
      <div>User name</div>
      <input name="username" type="text"/>
      <div>Password</div>
      <input name="password" type="text"/>
      <button>Login</button>
    </form>
  </body>
</html>

