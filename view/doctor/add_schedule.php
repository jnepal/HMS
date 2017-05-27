<?php

include_once(PATH.'controllers/doctorcontroller.php');
$sql="Select * from status";
$res=mysql_query($sql);
while($arr=mysql_fetch_array($res))
{	
	$opt.='<option value="'.$arr['name'].'">'.$arr['name'].'</option>';	
}

$day=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

foreach($day as $value)
{
	$str.='<option value="'.$value.'">'.$value.'</option>';
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];
	$weekday=$_POST['weekday'];
	$place=$_POST['place'];
	$id=$_POST['doctor_id'];
	foreach($start_time as $key => $val)
	{
		$each_start_time=$val;
		$each_end_time=$end_time[$key];
		$each_weekday=$weekday[$key];
		$each_place=$place[$key];
	
	if($each_end_time!=""&& $each_start_time!="" && $each_place!="" && $each_weekday!="")
	{
		$arr=array();//to intiliaze array
		$arrdoc['start_time']=$each_start_time;
		$arrdoc['end_time']=$each_end_time;
		$arrdoc['doctor_id']=$id;
		$arrdoc['weekday']=$each_weekday;
		$arrdoc['place']=$each_place;
		$sql="Delete from doctor_schedule where doctor_id=".$id." and weekday='".$each_weekday."'" ;
		$res=mysql_query($sql);
		add_scheduledoc($arrdoc);
	
	}
	}
}

?>
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td>Start Time</td>
    <td>End Time</td>
    <td>week Day</td>
    <td>place</td>
  </tr>
  <input type="hidden" name="doctor_id" value="<?php echo $_GET['id']; ?>"/>
  <?php for($i=0;$i<7;$i++) { 
  $sql="Select * from doctor_schedule where doctor_id=".$_GET['id']." and weekday='".$day[$i]."'" ;
  $res=mysql_query($sql) or die(mysql_error());
  $row=mysql_fetch_array($res);
  
  ?>
  <tr>
    <td><input type="time" name="start_time[]" value="<?php echo $row['start_time']; ?>" id="textfield"></td>
    <td><input type="time" name="end_time[]"value="<?php echo $row['end_time']; ?>" id="textfield2"></td>
    <td><select name="weekday[]"><option value="<?php echo $row['weekday']?>"><?php echo $row['weekday']?></option><?php echo $str ?></select></td>
    <td><select name="place[]"><option value="<?php echo $row['place'] ?>"><?php echo $row['place']?></option><?php echo $opt ?></select></td>
  </tr>
  <?php } ?>
  <tr>
  	<td colspan="4"><input type="submit" name="button" id="button" value="Update"></td>
  </tr>
</table>
</form>