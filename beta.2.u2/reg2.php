<?php
error_reporting(0);
echo'
<title> NovaEd | Registration
</title>';
echo"<form method=post>";

echo'
(* required fields)<br/>
*<input type="text" placeholder="Last Name" name="lname"/>
*<input type="text" placeholder="First Name" name="fname"/>
<input type="text" placeholder="Middle Name" name="mname"/><br/>
*<input type=text placeholder="Student Number/Username" name="uname"/><br/>
*<input type=password placeholder="Password" name="password"/>
*<input type="password" placeholder="Confirm Password" name="password"/>
<input type="text" placeholder="Age" name="age"/><br/>
<input type="text" placeholder="Nickname" name="nname"/><br/>
*<input type="text" placeholder="Parent last name" name="plname"/><br/>
<input type="text" placeholder="Parent bitch" name="pfname"/><br/>
<input type="text" placeholder="Parent jerk" name="pmname"/><br/>


*<input type="text" placeholder="Place of Birth" name="pob"/><br/>



*Gender:<br/>
<input type="radio"  name="fm" value="Female"/>Female
<input type="radio"  name="fm" value="Male"/>Male<br/>
<input type="text" placeholder="Religion" name="reli"/><br/>
*<input type="text" placeholder="Citizenship" name="citi"/><br/>



*Home Address:<br/>


<input type=text placeholder="Street" name=str/>
<input type=text placeholder="Village/Barangay" name=brgy/>
<input type=text placeholder="City/Town" name=ctown/><br/>
<input type=text placeholder="District" name=dist/>
<input type=text placeholder="Province" name=prov/>
<input type=text placeholder="Zip Code" name=zip/><br/>
<input type=text placeholder="Home Phone" name=hphone/><br/>
<input type=text placeholder="Mobile Phone" name=mphone/><br/>
*<input type=text placeholder="Email Address" name=email/><br/>


*College Graduate?<br/>

<input type="radio"  name="yn" value="Yes"/>Yes
<input type="radio"  name="yn" value="No"/>No<br/>';
echo"<form method=post>";
echo'
If No, when is the expected date of graduation?<br/>
<input type="text" placeholder="Date" name="gdate"/>
<input type="text" placeholder="Name of Institution" name="iname"/>
<input type="text" placeholder="Date of Attendance" name="adate"/>
<input type="text" placeholder="Degree/Major" name="degm"/>
<input type="text" placeholder="Cumulative GPA" name="cgpa"/><br/>
<input type=submit name="btn_submit" value="Register"/>';


include('connection.php');

//Characters
$password;
$lname;
$fname;
$mname;
$nname;
$plname;
$pfname;
$pmname;
$dob;
$pob;
$gender;
$reli;
$citi;


//Numbers
$zip;
$hphone;
$mphone;
$uname;

$type;
$gindicator;
$gpa;

//Alphanumeric
$str;
$brgy;
$city;
$dist;
$prov;


//Date
$edg;
$dattendance;


if(isset($_POST['btn_submit']))

{

/*
PUT VALIDATION SCRIPTS HERE
*/


if(!empty($_POST['lname']) || !empty($_POST['fname']) || !empty($_POST['uname']) || !empty($_POST['password']) || !empty($_POST['age']) || !empty($_POST['nname']) || !empty($_POST['plname']) || !empty($_POST['pfname']) || !empty($_POST['pmname']) || !empty($_POST['dob']) || !empty($_POST['pob']) || !empty($_POST['gender']) || !empty($_POST['str']) || !empty($_POST['brgy']) || !empty($_POST['city']) || !empty($_POST['dist']) || !empty($_POST['prov']) || !empty($_POST['email']) || !empty($_POST['gindicator']) == 1)
{

//TRANSFER FORM DATA TO VARIABLES

if(isset($_POST['fm']))
{
if($_POST['fm'] == 'Male')
$gender = "Male";
}

else
$gender = "Female";

if(isset($_POST['yn']))
{
if($_POST['yn'] == 'Yes')
$gindicator = 1;
}

else
$gindicator = 0;

//Characters
$password = $_POST['password'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$nname = $_POST['nname'];
$plname = $_POST['plname'];
$pfname = $_POST['pfname'];
$pmname = $_POST['pmname'];
$dob = $_POST['dob'];
$pob = $_POST['pob'];
$reli = $_POST['reli'];
$citi = $_POST['citi'];
//Numbers
$zip = $_POST['zip'];
$hphone = $_POST['hphone'];
$mphone = $_POST['mphone'];
$uname = $_POST['uname'];
$type = 0;
$gpa = 0;

//Alphanumeric
$str = $_POST['str'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$dist = $_POST['dist'];
$prov = $_POST['prov'];
//Date
$edg = "";
$dattendance = "";


//INSERT DATA TO DATABASE


mysql_query("INSERT INTO `User`(`user_id`, `password`, `last_name`, `first_name`, `middle_name`, `type`, `parent_lastname`, `parent_firstname`, `parent_middlename`, `nickname`, `birthdate`, `place_of_birth`, `gender`, `religion`, `citizenship`, `street`, `barangay`, `city`, `district`, `province`, `zipcode`, `home_phone`, `mobile_phone`, `email_address`, `graduate_indicator`, `date_expected_grad`, `name_institution`, `date_attendance`, `course`, `cumulative_gpa`) VALUES('$uname','$password','$lname','$fname','$mname','$type','$plname','$pfname','$pmname','$nname','$dob','$pob','$gender','$reli','$citi','$str','$brgy','$city','$dist','$prov','$zip','$hphone','$mphone','$email','$gindicator','$edg','$ins','$dattendance','$course','$gpa')");

echo"<script>alert('Registration Successful!');</script>";
}

else
echo"<script>alert('Please fill all the required fields');</script>";



}
echo"</form>";
?>

