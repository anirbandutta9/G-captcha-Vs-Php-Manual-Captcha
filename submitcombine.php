<?php
// Coded By Anirban Dutta(fb/hacker.anirban.dutta)
?>
<?php
session_start();
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["comment"])) {
	echo "Comment is empty <br/> " ;
	$error = true;
}

else {
	$comment = $_POST["comment"];
	if (strlen($comment) < 2 ) {
		echo "invalid comment <br/> ";
		$error = true;
	}
}
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"] == '') {
echo "<h2>Incorrect Manual Captcha Code</h2>"; 
$error = true;
}
else {
	$vercode = $_POST["vercode"];
}
if (isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check "I am not a Robot" captcha too</h2>';
		  $error = true;
		  exit;
        }
        $secretKey = "6LeD3hEUAAAAADNeeaGRfKmABjn1gnsXxrpdTa2J";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer !</h2>';
		  $error = true;
        }
if ($error === false) {
	echo "Submitted successfully <br/><br/>" . "Your Comment is : " . htmlentities($comment) . "<br/>" . " Taking you back to home within 10 sec..." ;
}
}
header('Refresh: 10;url=index.php'); 
?>

<form action="index.php">
<br><br>
<input type="submit" value="Resubmit" />
</form>