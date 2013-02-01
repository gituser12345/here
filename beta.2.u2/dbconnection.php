
<?php
$link=mysql_connect("localhost","pma","root");
  $database='test';              // it is Database name that you created
  if (!$link)
  die('Failed to connect to Server'.mysql_error());
  $db=mysql_select_db($database, $link);
  if(!$db)
  die('Failed to select Data Base '.mysql_error());
?>

