
<?php 
include_once("init.php");
include_once(PATH."controllers/doctorcontroller.php");
$rowdoc=showdoc();
if($_POST['fullname']=="")
{
	$_POST['fullname']=-1;
}
$status=$_GET['status'];
if($status=="serve")
{   $ten_time=$_GET['tentative_time'];
	$app_id=$_GET['apppointment_id'];
	$time=date('H:i:s');
	echo $sql="update appointments
	set serve_time='".$time."',
	tentative_time='".$ten_time."'
	where id=".$app_id;
	mysql_query($sql) or die(mysql_error());
}
$sql="select
a.start_time,
a.serve_time,
a.id,
a.end_time,
a.doctor_id,
a.name,
a.apppointment_date,
dr.fullname
from 
appointments as a
join doctor as dr on (a.doctor_id=dr.id)
where 
a.doctor_id=".$_POST['fullname']."
and apppointment_date='".date('Y-m-d')."'";
$res=mysql_query($sql) or die(mysql_error());
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
  <table width="100%" border="0">
    <tr>
      <td width="400">Department: 
      <select name="department">
    		
            <option value="">chooose</option>
           

        </select>
      </td>
      <td width="400">Date:
      <input type="date" name="from_date" id="textfield" /> 
      to:
      <input type="date" name="to_date" id="textfield3" /></td>
    </tr>
    <tr>
      <td>Doctor:
      <select name="fullname">
    		
            <option value="">chooose</option>
            <?php foreach($rowdoc as $key=>$arr) {?>
            <option value="<?php echo $arr['id'] ?>"><?php echo $arr['fullname']; ?></option>
            <?php } ?>
            
          
        </select>
      <td><p>Patient name:
      <input type="text" name="patient" id="textfield5" />
      </p>
      <p>
        <input type="submit" name="button" id="button" value="Submit" />
      </p></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td>S.N</td>
    <td>Patient Name</td>
    <td>Doctor Name</td>
    <td>Date</td>
    <td>Tentative Time</td>
    <td>Status</td>
  </tr>
  <?php 
  $i=0;
  while($row=mysql_fetch_array($res)) { $i++;  
  $sec=strtotime($row['start_time']);
  $ten=$sec+$i*(15*60);
  $ten_time=date('H:i:s',$ten);
  ?>
    <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['apppointment_date'];?></td>
    <td><?php echo $ten_time; ?> </td>
    <td><?php if($row['serve_time']=="00:00:00") {?>
    <a href="?module=<?php echo $_GET['module'];?>&status=serve&apppointment_id=<?php echo $row['id']?>&tentative_time=<?php echo $ten_time; ?>" >Serve</a>
	<?php } else echo "Already Served at ". $row['serve_time']?>
    
    </td>
    
  </tr>
  <?php } ?>
</table>
</body>

</html>