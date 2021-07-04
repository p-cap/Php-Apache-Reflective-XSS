<?php
$username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);

if(preg_match("/^[a-zA-Z0-9_.-]*$/", $username)) {
	echo ' <h1> Welcome, ' . $username . '</h1>';
}
else {
	echo '<h1> You are not a username</h1>';
}
?>
<br />
<input type="button" value="Back" onClick="history.go(-1)"/>

