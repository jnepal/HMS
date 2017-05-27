<?php 
include_once("../init.php");
include_once(PATH.'controllers/departmentcontroller.php');
include_once(PATH.'controllers/doctorcontroller.php');
//to show department
$row=show();
//print_r($row);
$weekday=date('l');
$department_id=$_GET["department_id"];
if($_SERVER['REQUEST_METHOD']=='POST'){
	echo "<pre>";
	print_r($_POST);
	
	$start_time=$_POST["start_time"];
	$end_time=$_POST["end_time"];
	$doctor_id=$_POST["doctor_id"];
	$req_start_time=$start_time[$doctor_id];
	$req_end_time=$end_time[$doctor_id];
	
	$sql="insert into appointments 
	(
	apppointment_date ,
	start_time ,
	end_time ,
	doctor_id ,
	name ,
	mobile
	)
	VALUES
	(
	'".date('Y-m-d')."',
	'".$req_start_time."',
	'".$req_end_time."',
	".$_POST["doctor_id"]." ,
	'".$_POST["name"]."',
	'".$_POST["mobile"]."'

	)	";
	mysql_query($sql);
	//email notification
	$to      = 'talumaalu@gmail.com';
	$subject = 'Fake sendmail test';
	$message = 'If we can read this, it means that our fake Sendmail setup works!';
	$headers = 'From: timus2001@gmail.com' . "\r\n" .
			   'Reply-To: talumaalu@gmail.com' . "\r\n" .
			   'X-Mailer: PHP/' . phpversion();
	
	if(mail($to, $subject, $message, $headers)) {
		echo 'Email sent successfully!';
	} else {
		die('Failure: Email was not sent!');
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
	function setDepartment(obj){
		window.location="index.php?department_id="+obj.value;
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
  <table width="100%" border="0">
  <tr>
    <td width="23%">Patient Name</td>
    <td width="77%"><input type="text" name="name" id="textfield" /></td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile" id="textfield2" /></td>
  </tr>
  <tr>
    <td>Department</td>
    <td>
    	<select name="department" onchange="setDepartment(this)">
    		
            <option value="">chooose</option>
           <?php 
		   foreach($row as $key=>$arr)
		   {
			   $selected=($department_id==$arr['id']) ? "selected" :"";
			   ?>
           		 <option value="<?php echo $arr['id']; ?>" <?php echo $selected;?>><?php echo $arr['name']; ?></option>
		   <?php }?>

        </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0">
      <tr>
        <td width="39%"><strong>Doctor Name</strong></td>
        <td width="22%"><strong>Start Time</strong></td>
        <td width="25%"><strong>End Time</strong></td>
        <td width="14%">&nbsp;</td>
      </tr>
      <?php
	  	$sql="select
				s.start_time,
				s.end_time,
				s.doctor_id,
				dr.fullname
				from 
				doctor_schedule s
				join doctor dr on (s.doctor_id=dr.id)
				where dr.department_id=".$department_id."
				and weekday='".$weekday."'
				and place='OPD'";
	  
	  	$res=mysql_query($sql);
		while($row=mysql_fetch_array($res)){?>
	  
                   <tr>
                    <td><?php echo $row["fullname"]; ?></td>
                    <td><?php echo $row["start_time"]; ?><input type="hiddden"  name="start_time[<?php echo $row["doctor_id"]; ?>]" value="<?php echo $row["start_time"]; ?>"/></td>
                    <td><?php echo $row["end_time"]; ?><input type="hiddden"  name="end_time[<?php echo $row["doctor_id"]; ?>]" value="<?php echo $row["end_time"]; ?>"/></td>
                    <td><input type="radio" name="doctor_id" id="radio" value="<?php echo $row["doctor_id"]; ?>" />
                      <label for="radio"></label></td>
                      
                  </tr>
         <?php } ?>         
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Submit" /></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
</body>
</html>