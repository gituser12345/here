<html>
<head>
<title> NovaEd | Log In
</title>
<link rel="stylesheet" type="text/css" href="t.css" />
<link href="js-image-slider.css" rel="stylesheet" type="text/css" /> <script src="js-image-slider.js" type="text/javascript"></script>
<script type="text/javascript" src="date.js"></script>
<script type="text/javascript" src="time.js"></script>
</head>
<body background src='wall.jpg'>
<?php
echo"
<div id='logform'>";

//connection
include 'dbconnection.php';

$result = mysql_query("SELECT User.user_id, User.password, User.type, User.last_name, User.first_name, User.middle_name FROM User");
date_default_timezone_set('Asia/Manila');
$timein="";
$time=date("H:i");
$timeout="";
$date=date("Y/m/d");

echo"<form method=post>";
echo"<img src='novasys.png'><br/><br/>";
echo'<span id="date"></span>
     <script type="text/javascript">window.onload = date(\'date\');</script><br>';
echo'<span id="time"></span>
     <script type="text/javascript">window.onload = time(\'time\');</script>';
echo"<input type=text name=username placeholder=Username><br/>";
echo"<input type=password name=password placeholder=Password><br/>";
echo"<input type=submit name=loginbtn value=Sign&nbsp;In class='btnlog'>";
echo"</form>";

if(isset($_POST['loginbtn']))
{	$x=0;
	while($row = mysql_fetch_assoc($result)) 
	{
   		$id= $row['user_id'];
    		$password=$row['password'];
		$type = $row['type'];
		$lname=$row['last_name'];
		$fname=$row['first_name'];
		$mname=$row['middle_name'];
		

		if($_POST['username']==$id && $_POST['password']==$password)
		{	$x=1;
			if($type=="employee" || $type=="Employee" || $type=="EMPLOYEE")
			{header('location:admin.php');}
			else{
			mysql_query("INSERT INTO User_Log(user_id,user_time,user_date) VALUES('$id','$time','$date')");
			echo"<script>alert('$fname,You have successfully logged your time!');</script>";
			}
		}
	}
if($x==0)
echo"<script>alert('Invalid username or password!');</script>";	
} 
echo"<br/><a class=link href='forgetpass.html'>Forgot Password?</a>";
echo"</form>
</div>
";
?>



