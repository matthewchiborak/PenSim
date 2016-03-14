<?php require_once('dbConfig.php');
session_start();
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST["userId"];
    $password = $_POST["password"];
	 if ($userId == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT * FROM systemuser WHERE UserID = '$userId' AND UserPassword = '$password'";
        $query = mysqli_query($link,$sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }

        if (mysqli_num_rows($query) > 0) 
		{
			$dataFetched = $query->fetch_row();
			$_SESSION['userID'] = $dataFetched[0];
			$_SESSION['password'] = $dataFetched[1];
			$_SESSION['userName'] = $dataFetched[2];
			
            header('Location: index.php');
            exit;
        }

        $msg = "User ID and password do not match";
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        HTML Document Structure
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body> <!-- Copy the snippet beween the body tags and use it in your website, if required -->
<div id="option"> 
	<p>PenSimDB</p> 
</div>
<form id="form" name="frmregister" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<div id="block">
		<label id="user" for="name">p</label>
		<input type="number" placeholder="User ID" name="userId" id="name" required/>
		<label id="pass" for="password">k</label>
		<input type="password" placeholder="Password" name="password" id="password" required />
		<input type="submit" id="submit" name="submit" value="a"/>
		<?php 
		if($msg != "")
			echo "<br/><p>".$msg."</p>";	
		?>
	</div>
</form>
</body>
</html>
