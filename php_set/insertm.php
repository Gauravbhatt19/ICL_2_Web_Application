<?php
if(!isset($_POST['mbnom']))
{
	header("location: ../index.html");
}
else{
$conn=mysqli_connect("localhost","spidersd_icl_usr","BZ)HZ$F-_&}Z","spidersd_icl_2_db");
$mbno=mysqli_escape_string($conn,$_POST['mbnom']);
$name=mysqli_escape_string($conn,$_POST['fnm']);
$teamname=mysqli_escape_string($conn,$_POST['tnm']);
$year=mysqli_escape_string($conn,$_POST['yrm']);
if (isset($_POST['plyrm'])) 
	$plyr=1;
else
	$plyr=0;
 $qry="INSERT INTO managers(mbno,name,teamname,year,include_player) VALUES ('{$mbno}','{$name}','{$teamname}','{$year}','{$plyr}')";
$result=mysqli_query($conn,$qry);
if($result)
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Thank You..! You are successfully registered.' );
    window.location = '../index.html';},0);
	</script>";
else
{
	if (strpos(mysqli_error($conn),'Duplicate') !== false) {
			  	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'This mobile no. is already registered..!' );
    window.location = '../index.html#rm1';},0);
	</script>";
	}
	 else
	 	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Unknown Error...! Please try again..' );
    window.location = '../index.html#rm1';},0);
	</script>";
}
}
?>

