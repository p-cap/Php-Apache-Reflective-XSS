<?php
$username = $_GET['username'];

echo '<h1> Welcome, ' . $username . '</h1>';
?>

<input type="button" value="Back" onClick="history.go(-1)"/>
