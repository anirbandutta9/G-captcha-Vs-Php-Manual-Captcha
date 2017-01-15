<html>
<!--  Coded By Anirban Dutta(fb/hacker.anirban.dutta)  -->
<head>
<title>G-Captcha + Manual Captcha Form </title>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<form action="submitcombine.php" method="post">
Comment: <textarea name="comment"></textarea> <br><br>
Enter Captcha <img src="captcha.php"><br> 
<input type="text" name="vercode" /><br> <br>
<div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div> <br><br>

<input type="submit" name="submit" value="Submit"> 
<input type="reset" value="Reset">
</form>
</body>
</html>