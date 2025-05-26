<?php
session_start();
$_SESSION["username"] = "TestUser"; // Set session variable

echo "Session started and username set!<br>";
echo "<a href='get_session.php'>Go to next page</a>";
?>
