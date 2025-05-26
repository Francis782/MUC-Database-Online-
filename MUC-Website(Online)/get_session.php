<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "Session is working! Username: " . $_SESSION["username"];
} else {
    echo "Session not found! Make sure cookies are enabled.";
}
?>