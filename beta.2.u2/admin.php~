<html>
<head>
<title> NovaEd | Admin Page
</title>
<link rel="stylesheet" type="text/css" href="t.css" />
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
<script type="text/javascript" src="datepickr.js"></script>
</head>
<?php
session_start();
?>

<?php
//connection
include 'dbconnection.php';

//retrieve data from database to datagrid
$result=mysql_query("select distinct user_id from User where type='Student'");

		echo'<div id="timeform">';
		echo"<div id='banner'><img src='novasys.png'>
			<a href='reg.php'>Registration</a>
		     <div class='nav'>";
echo'
<form method=post>
<select name=query><option>User Id</option><option>Last Name</option><option>First Name</option><option>Middle Name</option><option>Class</option></select><input type="textbox" name="txtSearch" id="txtSearch" placeholder="search here"/>';
echo'<input type="image" name="image" src=search.png height="20px />';
		echo'<div id="logbtn"><a href=login.php class="log">Sign Out</a>
     </div>';

//initialize values
date_default_timezone_set('Asia/Manila');
$date=date("m/d/y");
$user_time=date("H:i");
$timeout="";
$ro='readonly';
//log details

		echo"<div id='container'>";
		echo"<div class='nav'>";
			echo"</div></div>";
		echo"<div id='tblform'>";
//form post
echo"<form method=post>";
//buttons
echo"<span class='redh'><h3>Students' List&emsp;<input type=submit name=btnLogin value=Log class='log'>&emsp;<input type=submit name=btnAdd value=Add class='log'><br/><br/></h3></span>";

echo"<div id='left'><table border=1>"; 
echo"<th><input type=checkbox id='toggle' value='select' onClick='do_this()' /></th><span class='redh'><th>ID</th></span><span class='redh'><th>Last Name</th></span><span class='redh'><th>First Name</th></span><span class='redh'><th>Middle Name</th></span><span class='redh'><th>Class</th></span><span class='redh'><th>Time</th></span>";
echo"<br/></div>";
//search for whom to user_time in/user_time out
if(isset($_POST['image_x']))
{	
	//search for user id
	if($_POST['query']=='User Id')
	{
	$result=mysql_query("select distinct user_id from User where type='Student' and user_id=\"".$_POST['txtSearch']."\"");
	while($row = mysql_fetch_assoc($result))
	{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select user_time as user_time from User_Log where user_id='$id' order by user_date desc, user_time desc");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['user_time'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}
	
	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td></tr>";
	}
	}
	}//search for user id end
	//search for last name
	if($_POST['query']=='Last Name')
	{
	$result=mysql_query("select distinct user_id from User where type='Student' and last_name=\"".$_POST['txtSearch']."\"");
	while($row = mysql_fetch_assoc($result))
	{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select user_time as user_time from User_Log where user_id='$id' order by user_date desc, user_time desc");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['user_time'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}
	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td></tr>";
	}
	}
	}//search for last name end
	//search for first name
	if($_POST['query']=='First Name')
	{
	$result=mysql_query("select distinct user_id from User where type='Student' and first_name=\"".$_POST['txtSearch']."\"");
	while($row = mysql_fetch_assoc($result))
	{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select user_time as user_time from User_Log where user_id='$id' order by user_date desc, user_time desc");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['user_time'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}
	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td>";
	}
	}
	}//search for first name end
	//search for middle name
	if($_POST['query']=='Middle Name')
	{
	$result=mysql_query("select distinct user_id from User where type='Student' and middle_name=\"".$_POST['txtSearch']."\"");
	while($row = mysql_fetch_assoc($result))
	{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select user_time as user_time from User_Log where user_id='$id' order by user_date desc, user_time desc");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['user_time'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}

	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td></tr>";
	}
	}
	}//search for middle name end
	//search for class
	if($_POST['query']=='Class')
	{
	$result=mysql_query("select distinct user_id from User where type='Student' and class=\"".$_POST['txtSearch']."\"");
	while($row = mysql_fetch_assoc($result))
	{
	$id=$row['user_id'];
	$result2=mysql_query("SELECT User.last_name,User.first_name, User.middle_name,User.class from User where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	$logIn=mysql_query("select user_time as user_time from User_Log where user_id='$id' order by user_date desc, user_time desc");
	$lival=mysql_fetch_assoc($logIn);
	$lival2=$lival['user_time'];
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($lival=="")
	{$ti="&nbsp";}
	else
	{$ti=$lival2;}

	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti</td></tr>";
	}
	}
	}//search for class end	
}

//output for datagrid
while($row = mysql_fetch_assoc($result))
{
	$ti2="";
	$id=$row['user_id'];
	$result2=mysql_query("SELECT distinct User.last_name,User.first_name, User.middle_name,User.class,(select user_time from User_Log where user_id='$id' order by user_date desc, user_time desc limit 1)as user_time from User left join User_Log on User.user_id=User_Log.user_id where User.user_id='$id'");

	while($row2=mysql_fetch_assoc($result2))
	{
	echo"<tr><td><input type=checkbox name=chk[] value=$id></td>";
	//$ti=$row2['user_log_id'];
	//$result3=mysql_query("select user_time from User_Log where user_log_id='$ti' and date='$date'");
	//while($row3=mysql_fetch_assoc($result3))
	$ti2=$row2['user_time'];	
	$lname=$row2['last_name'];
	$fname=$row2['first_name'];
	$mname=$row2['middle_name'];
	$class=$row2['class'];
	
	if($ti2=="")
	{$ti3="&nbsp";}
	else
	{$ti3=$ti2;}

	echo"<td><input type='submit' name=btn value='$id'></td><td>$lname</td><td>$fname</td><td>$mname</td><td>$class</td><td>$ti3</td></tr>";
	}
}

echo"</td></table><br/><div>";
	
//if "log" is clicked
if(isset($_POST['btnLogin']))
{
	
	if(!empty($_POST['chk'])) 
	{
		foreach($_POST['chk'] as $value)
		{
		mysql_query("INSERT INTO User_Log(user_id,user_time,user_date) VALUES('$value','$user_time','$date')");
		}
		try{header('location:admin.php');}
		catch(exception $x){}
	}
}
//right pane
echo"<div id=right>
<div id='tables'>";
echo"<form method=post>";
//add user_user_time
if(isset($_POST['btnAdd']))
{
  if(empty($_POST['chk']))
  {echo"<script>alert('Please choose for whom to add time.');</script>";}
else{
$_SESSION['idval']=$_POST['chk'];
echo"<table border=1>";
echo"
<span class='redh'><h3>Log Details&emsp;<input type=submit name=btnaSave value='Save' class='log'></h3></span><br/><br/><br/>
<table border=1 class=details>";
echo"<td><span class='redh'>User ID</span></td><td><span class='redh'>hh</span></td><td><span class='redh'>mm</span></td><td><span class='redh'>Date</span></td>";
    if(!empty($_POST['chk'])) 
    {
	foreach($_POST['chk'] as $value)
	{
         $result=mysql_query("select user_id from User where user_id='$value'");
	while($arow=mysql_fetch_assoc($result))
	{
	$id=$arow['user_id'];
	echo"<tr><td>$id</td>
	<td><input type=text name=atxt[] onkeyup=\"this.value = this.value.replace(/[a-z]/,'')\" maxlength=2 size=1/></td>
	<td><input type=text name=atxt[] onkeyup=\"this.value = this.value.replace(/[^0-9]/,'')\" maxlength=2 size=1/></td>
        <td><input id=\"datepick2\" name=date size=\"2\"/></td></tr>";
        //script date picker
        echo"<script>new datepickr('datepick2',{'dateFormat': 'm/d/y'});</script>";
	}
	}
    }}
}
//to save added user_time
if(isset($_POST['btnaSave']))
{  $x=0;
   $y=1;
   $v=$_POST['atxt'];
   $h=date("H");
   $m=date("i");
   foreach($_SESSION['idval'] as $idarr)
   {
   if($v[$x]>23||$v[$y]>59||$v=='a'||$v=='b'||$v=='c'||$v=='d'||$v=='e'||$v=='f'||$v=='g'||$v=='h'||$v=='i'||$v=='j'||$v=='k'||$v=='l'||$v=='m'||$v=='n'||$v=='o'||$v=='p'||$v=='q'||$v=='r'||$v=='s'||$v=='t'||$v=='u'||$v=='v'||$v=='w'||$v=='x'||$v=='y'||$v=='z')
   {echo"<script>alert('Invalid Time');</script>";}
   
   else if($v[$x]>$h)
   {echo"<script>alert('Invalid Time');</script>";}

   else{
   if($v[$x]==$h&&$v[$y]<=$m)
   {
   $time=$_POST['atxt'][$x].':'.$_POST['atxt'][$y];
   mysql_query("insert into User_Log(user_id,user_time,user_date) values('$idarr','$time','$date')");
   $x+=2;
   $y+=2;
   header('location:admin.php');}
   else if($v[$x]<$h&&$v[$x]!=""&&$v[$y]!="")
   { 
   $time=$_POST['atxt'][$x].':'.$_POST['atxt'][$y];
   mysql_query("insert into User_Log(user_id,user_time,user_date) values('$idarr','$time','$date')");
   $x+=2;
   $y+=2;
   header('location:admin.php');}

   else if($v[$x]==""||$v[$y]=="")
   {$x+=2;
    $y+=2;}
   else
   {echo"<script>alert('Invalid Input');</script>";}
   }
   }
}
//log details
if(isset($_POST['btn']))
{
echo"
<span class='redh'><h3>Log Details&emsp;<input type=submit name=btnSave value='Save' class='log'></h3></span><br/><br/><br/>
<table border=1 class=details>";
 
echo'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input id="datepick2" name=date size="5" placeholder="Search date"/><input type="image" name="search" src=search.png height="20px" />';

//script date picker
echo"<script>new datepickr('datepick2',{'dateFormat': 'm/d/y'});</script>";

echo"<span class='redh'><th>User ID</th></span><span class='redh'><th>hh</th></span><span class='redh'><th>mm</th></span>";
$_SESSION['value']=$_POST['btn'];
$log=mysql_query("select User.user_id,substr(User_Log.user_time, 1,2) as user_time,substr(User_Log.user_time, 4,2) as user_time2 ,User_Log.user_log_id from User left join User_Log on User.user_id=User_Log.user_id where User_Log.user_id=\"".$_SESSION['value']."\" and User_Log.user_date='$date'");


while($log2=mysql_fetch_assoc($log))
{
$_SESSION['uli']=$log2['user_log_id'];
$view=$log2['user_id'];
$view2=$log2['user_time'];
$view3=$log2['user_time2'];
echo"<tr><td>$view</td>
     <td><input type=text value='$view2' name=txt[] onkeyup=\"this.value = this.value.replace(/[^0-9]/,'')\" maxlength=2 size=1></td>
     <td><input type=text value='$view3' name=txt[] onkeyup=\"this.value = this.value.replace(/[^0-9]/,'')\" maxlength=2 size=1></td></tr>";
}
}
//save the update time
if(isset($_POST['btnSave']))
{ $x=0;
  $y=1;
  $v=$_POST['txt'];
  $h=date("h");
  $m=date("i");
  $savequery=mysql_query("select user_log_id from User_Log where user_id=\"".$_SESSION['value']."\" and user_date='$date'");
    while($srow=mysql_fetch_assoc($savequery))
    {
    if($v[$x]>23||$v[$y]>59||$v=='a'||$v=='b'||$v=='c'||$v=='d'||$v=='e'||$v=='f'||$v=='g'||$v=='h'||$v=='i'||$v=='j'||$v=='k'||$v=='l'||$v=='m'||$v=='n'||$v=='o'||$v=='p'||$v=='q'||$v=='r'||$v=='s'||$v=='t'||$v=='u'||$v=='v'||$v=='w'||$v=='x'||$v=='y'||$v=='z')
    {echo"<script>alert('Invalid Input');</script>";}

    else if(strlen($_POST['txt'][$x])!=2||strlen($_POST['txt'][$y])!=2)
    {echo"<script>alert('Invalid Input,Input should be 2 digits');</script>";}

    else if($v[$x]>$h)
    {echo"<script>alert('Invalid Time');</script>";}

    else if($v[$x]==""||$v[$y]=="")
    {
    $x+=2;
    $y+=2;
    }

    else{
    if($v[$x]==$h&&$v[$y]<=$m){
    $time=$_POST['txt'][$x].':'.$_POST['txt'][$y];
    $logid=$srow['user_log_id'];
    mysql_query("update User_Log set user_time='$time' where user_log_id='$logid'");
    $x+=2;
    $y+=2;
    header('location:admin.php');}
    else if($v[$x]<$h)
    { 
    $time=$_POST['atxt'][$x].':'.$_POST['atxt'][$y];
    mysql_query("insert into User_Log(user_id,user_time,user_date) values('$idarr','$time','$date')");
    $x+=2;
    $y+=2;
    header('location:admin.php');}
    else
    {echo"<script>alert('Invalid Input');</script>";}
    }
    }
}
//search for date
if(isset($_POST['search_x']))
{
echo"
<span class='redh'><h3>Log Details&emsp;<input type=submit name=btnSave value='Save' class='log'></h3></span><br/><br/><br/>
<table border=1 class=details>";
 
echo'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input id="datepick2" name=date size="5" placeholder="Search date"/><input type="image" name="search" src=search.png height="20px" /><br/>';

//date picker
echo"<script>new datepickr('datepick2',{'dateFormat': 'm/d/Y'});</script>";

echo"<span class='redh'><th>User ID</th></span><span class='redh'><th>hh</th></span><span class='redh'><th>mm</th></span>";
$log=mysql_query("select User.user_id,substr(User_Log.user_time, 1,2) as user_time,substr(User_Log.user_time, 4,2) as user_time2 ,User_Log.user_log_id from User left join User_Log on User.user_id=User_Log.user_id where User_Log.user_id=\"".$_SESSION['value']."\" and User_Log.user_date=\"".$_POST['date']."\"");


while($log2=mysql_fetch_assoc($log))
{
$_SESSION['uli']=$log2['user_log_id'];
$view=$log2['user_id'];
$view2=$log2['user_time'];
$view3=$log2['user_time2'];
echo"<tr><td>$view</td>
     <td><input type=text value='$view2' name=txt[] onkeyup=\"this.value = this.value.replace(/[^0-9]/,'')\" maxlength=2 size=1></td>
     <td><input type=text value='$view3' name=txt[] onkeyup=\"this.value = this.value.replace(/[^0-9]/,'')\" maxlength=2 size=1></td></tr>";
}
}
echo"</form>";
echo"</td></table></div></div></div>";
echo"</div>";
?>
</body>
</html>
