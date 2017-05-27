<?php
include_once('appcontrollers.php');
connectDB();
function add($arr )
{
	extract($arr);
	
	 echo $sql="INSERT INTO department
	(name,is_active,created_date)
	VALUES
	('".$name."','Y','".date('Y-m-d')."')";
	
	mysql_query($sql) or die (mysql_error());
	

}
function edit()
{



}


function delete($id)
{
	
	
	 $sql="Delete from department where id=".$id;
	$res=mysql_query($sql) or die(mysql_error());
	


}

function update($arr)
{
 extract($arr);
 $sql="UPDATE department set name='".$name."' where id=".$id;
 $res=mysql_query($sql);
 
}
function show($id=NULL)
{
	
	if($id!='')
	{
		$sql="select * from department where id=".$id;
	}
	else
	{
		$sql="select * from department";
		
	}
	$res=mysql_query($sql);
	while($arr=mysql_fetch_array($res))
	{
	 $new_arr[]=$arr;
	}
	
	return $new_arr;


}

?>