<?php
	$t1=date('Y-m-d')."12:05:00";	
	$t2=date('Y-m-d')."16:01:00";
	$sect1=strtotime($t1);
	$sect2=strtotime($t2);
	echo ($sect2-$sect1)/(60*15); //total cutomer served
	
	$cnt=16;
	$mytime=$sect1+$cnt*60*15;
	echo "<br>";
	echo $mydate=date('H:i:s',$mytime);
	
		
?>