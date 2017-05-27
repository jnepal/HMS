<?php
include_once(PATH.'controllers/doctorcontroller.php');
include_once(PATH.'init.php');
include_once(PATH.'controllers/appcontrollers.php');
error_reporting(E_ALL^E_NOTICE);
connectDB();
if($_GET['mode']=='delete')
{
	$rowp=showdoc($_GET['id']);
	$photo=$rowp[0]['photo'];
	unlink($photo);
 deletedoc($_GET['id']);
 
}
$row=showdoc();
?>
<table width="100%" border="0">
  <tr>
    <td><strong>ID</strong></td>
    <td><strong>Name</strong></td>
    <td><strong>Department</strong></td>
    <td><strong>Photo</strong></td>
    <td><strong>Designation</strong></td>
    <td><DD><strong>Action</strong></DD></td>
  </tr>
  <?php 
		   foreach($row as $key=>$arr)
		   {
	?>
  <tr bgcolor="<?php if($key%2==0){?>#999999<?php } ?>">
    <td><?php echo $arr['id']; ?></td>
    <td><?php echo $arr['fullname']; ?></td>
    <td><?php echo $arr['name']; ?></td>
    <td><img src="<?php echo $arr['photo']; ?>" height="100" width="100" /></td>
    <td><?php echo $arr['designation']; ?></td>
    <td><table width="75%" height="38" border="0">
      <tr>
        <td width="23%"><a class="btn btn-large btn-primary btn-block" href="?module=view/doctor/update.php&amp;id=<?php echo $arr['id']?>">Edit</a></td>
        <td width="44%"><a class="btn btn-large btn-primary btn-block" href="?module=view/doctor/add_schedule.php&amp;id=<?php echo $arr['id']?>">Update Schedule</a></td>
        <td width="33%"><a class="btn btn-large btn-primary btn-block" onclick="confirm("Are you Sure ?")"class="btn btn-large btn-primary btn-block" href="?module=<?php echo $_GET['module'] ?>&amp;mode=delete&amp;id=<?php echo $arr['id']?>">Delete</a></td>
      </tr>
      
    </table></td>
  </tr>
  <?php } ?>
</table>




		
