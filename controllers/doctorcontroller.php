<?php
include_once('appcontrollers.php');
connectDB();
function adddoc($arr )
{
	extract($arr);
	echo $sql="INSERT INTO doctor
	(fullname,department_id,photo,joined_date)
	VALUES
	('".$fullname."',".$department_id.",'".$photo."','".date('Y-m-d')."')";
	
	mysql_query($sql);
	echo "Doctor Added";
	

}
function editdoc()
{



}

function add_scheduledoc($arrdoc)
{
	extract($arrdoc);
	echo $sql="Insert INTO doctor_schedule(doctor_id,start_time,end_time,weekday,place)
	Values('".$doctor_id."','".$start_time."','".$end_time."','".$weekday."','".$place."')";
	mysql_query($sql) or die(mysql_error());
}


function deletedoc($id)
{
	
	 $sql="Delete from doctor where id=".$id;
	$res=mysql_query($sql) or die(mysql_error());
	


}

function updatedoc($arr)
{
	print_r($arr);
 extract($arr);
  echo $sql="UPDATE doctor set fullname='".$name."',photo='".$photo."' where id=".$id;
 $res=mysql_query($sql);
 
}
function showdoc($id=NULL)
{
	
	if($id!='')
	{
		 $sql="select * from doctor  where id=".$id;
		 $photo=$arr['photo'];
		 unlink($photo);
	}
	else
	{
		$sql="select dr.id,dr.fullname,de.name,dr.photo,dr.designation from doctor dr join department de on (dr.department_id=de.id)";
	}
	$res=mysql_query($sql);
	while($arr=mysql_fetch_array($res))
	{
	 $new_arr[]=$arr;
	}
	
	return $new_arr;


}

?>