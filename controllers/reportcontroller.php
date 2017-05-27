<?php 
include_once("init.php");
include_once(PATH."controllers/doctorcontroller.php");
function report()
{
	$sql="Select * from appointments";
	$res=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
	
	return($row);
	
	}
}

?>