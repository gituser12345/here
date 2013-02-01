<html>
<head>
<title> NovaEd | Log In
</title>
<link rel="stylesheet" type="text/css" href="astyle.css" />
<!Script for select all checkboxes-->
<script type="text/javascript">

    function do_this(){

        var checkboxes = document.getElementsByName('chk[]');
        var button = document.getElementById('toggle');

        if(button.value == 'select'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'deselect'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'select';
        }
    }
</script>
</head>

<body>
<?php
//connection
include 'dbconnection.php';

//retrieve data from database to datagrid
$result=mysql_query("select distinct user_id from User");

echo'<div id="timeform">
<div id="banner"><img src="novasys.png">
<div class="nav">';
echo'
<form method=post>
<select name=query><option>Name</option><option>Class</option><option>User Id</option><option>Time In</option><option>Time Out</option></select><input type="textbox" name="txtSearch" placeholder="search here">';
echo'<input type="image" name="image" src=search.png height="20px />';
echo'<div id="logbtn"><a href=login.php class="log">Sign Out</a></div>';
echo"<form method=post>";
echo"<input type=submit name=btnLogin value=Time-in class='log'>";
echo"&emsp;";
echo"<input type=submit name=btnLogout value=Time-out class='log'></div>";

//search for whom to time in/time out
if(isset($_POST['image_x']))
{
	if($_POST['query']=='Name')
	{
$result=mysql_query("SELECT User.user_id,User.Name,User.class,User_Log.time_in,User_Log.time_out,User_Log.Date FROM User LEFT JOIN User_Log ON User.user_id=User_Log.user_id WHERE User.type='Student' AND User.Name=\"".$_POST['txtSearch']."\"");
	}

	if($_POST['query']=='User Id')
	{
$result=mysql_query("SELECT User.user_id,User.Name,User.class,User_Log.time_in,User_Log.time_out,User_Log.Date FROM User LEFT JOIN User_Log ON User.user_id=User_Log.user_id WHERE User.type='Student' AND User.user_id=\"".$_POST['txtSearch']."\"");
	}

	if($_POST['query']=='Class')
	{
$result=mysql_query("SELECT User.user_id,User.Name,User.class,User_Log.time_in,User_Log.time_out,User_Log.Date FROM User LEFT JOIN User_Log ON User.user_id=User_Log.user_id WHERE User.type='Student' AND User.class=\"".$_POST['txtSearch']."\"");
	}

	if($_POST['query']=='Time In')
	{
$result=mysql_query("SELECT User.user_id,User.Name,User.class,User_Log.time_in,User_Log.time_out,User_Log.Date FROM User LEFT JOIN User_Log ON User.user_id=User_Log.user_id WHERE User.type='Student' AND User_Log.time_in=\"".$_POST['txtSearch']."\"");
	}

	if($_POST['query']=='Time Out')
	{
$result=mysql_query("SELECT User.user_id,User.Name,User.class,User_Log.time_in,User_Log.time_out,User_Log.Date FROM User LEFT JOIN User_Log ON User.user_id=User_Log.user_id WHERE User.type='Student' AND User_Log.time_out=\"".$_POST['txtSearch']."\"");
	}

}


//initialize values
date_default_timezone_set('Asia/Manila');
$date=date("m/d/Y");
$time=date("g:i A Y-m-d");
$timeout="";

echo"<div id='container'><div class='nav'>";
echo"<div id='logdiv'>";

echo"<table border=1>";
echo"<td>Name</td><td>Time in</td><td>Time out</td>";
if(isset($_POST['btn']))
{
$value=$_POST['btn'];
$log=mysql_query("select User.user_id,User_Log.time_in,User_Log.time_out from User left join User_Log on User.user_id=User_Log.user_id where User_Log.user_id='$value'");

while($log2=mysql_fetch_assoc($log))
{
$view=$log2['user_id'];
$view1=$log2['time_in'];
$view2=$log2['time_out'];
echo"<tr><td>$view</td><td>$view1</td><td>$view2</td></tr>";
}
}

echo"Log Details</div>";
echo"</div></div>";
echo"<div id='tblform'><table border=1>"; 
echo"<td><input type=checkbox id='toggle' value='select' onClick='do_this()' /></td><td><span class='redh'>Last Name</span></td><td><span class='redh'>First Name</span></td><td><span class='redh'>Middle Name</span></td><td><span class='redh'>Class</span></td><td><span class='redh'>Time In</span></td><td><span class='redh'>Time Out</span></td><td>";

//output for datagrid
while($row = mysql_fetch_assoc($result))
{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select time_in from User_Log where user_log_id=(select max(user_log_id) from User_Log where user_id='$id')");
	$logOut=mysql_query("select time_out from User_Log where user_log_id=(select max(user_log_id) from User_Log where user_id='$id')");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['time_in'];
	$loval=mysql_fetch_assoc($logOut);
	$loval2=$loval['time_out'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}

	if($loval=="")	
	{$to="&nbsp";}
	else
	{$to=$loval2;}
	
	echo"<td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td><td>$to</td></tr>";
	}
}

echo"</div>";
echo"</div>";

//if "Time in" is clicked
if(isset($_POST['btnLogin']))
{
	
	if(!empty($_POST['chk'])) 
	{
		foreach($_POST['chk'] as $value)
		{
		mysql_query("INSERT INTO User_Log(user_id,time_in,time_out) VALUES('$value','$time','$timeout')");
		}
		try{header('location:adminlogin.php');}
		catch(exception $x){}
	}

}
//if "Time out" is clicked
if(isset($_POST['btnLogout']))
{
	if(!empty($_POST['chk'])) 
	{
		foreach($_POST['chk'] as $value)
		{
		$result=mysql_query("SELECT MAX(user_log_id) FROM User_Log WHERE user_id='$value'");
		$prev=mysql_fetch_assoc($result);
		foreach($prev as $prev2)
		{$tprev=$prev2;}
		mysql_query("UPDATE User_Log SET time_out='$time' WHERE user_id = '$value' AND user_log_id='$tprev'");
		}
		try{header('location:adminlogin.php');}
		catch(exception $x){}
	}
}

?>
</body>
</html>

