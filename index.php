<?php

$db_host = "localhost";
$db_name = "website";
$db_user = "";
$db_password = "";

// Open database connection
$dbconn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_password")
    or die('Could not connect: ' . pg_last_error());

// Previous versions can be restored
// CTF{It doesn't even matter how hard you try}

// Close database connection
pg_close($dbconn);

?>
<!DOCTYPE html>
<html>
  <body>
    <h1>Login to the admin portal</h1>
    <form method="POST">
      <div>User name</div>
      <input name="username" type="text"/>
      <div>Password</div>
      <input name="password" type="text"/>
      <button>Login</button>
    </form>
  </body>
</html>

