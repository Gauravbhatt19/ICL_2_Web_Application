<?php
if(!isset($_POST['mbno']))
{
	header("location: ../index.html");
}
else{
$conn=mysqli_connect("localhost","spidersd_icl_usr","BZ)HZ$F-_&}Z","spidersd_icl_2_db");
$mbno=mysqli_escape_string($conn,$_POST['mbno']);
$name=mysqli_escape_string($conn,$_POST['fn']);
$type=mysqli_escape_string($conn,$_POST['typ']);
$achvmnts=mysqli_escape_string($conn,$_POST['achvemnt']);
$skills=mysqli_escape_string($conn,$_POST['skill']);
$year=mysqli_escape_string($conn,$_POST['yr']);
$file=$_FILES['fil'];
$file_type = $file['type'];
$file_ext=$file['name'];
$fn=$name.$mbno;
$file_ext=substr(strrchr($file_ext,'.'),1);
$size= $_FILES['fil']['size'];
$file_path = $file ['tmp_name'];
if($size<1100000 and $size !=0 ){
		$str='../uploads/'.$fn.'.jpg';
		move_uploaded_file($_FILES['fil']['tmp_name'], "{$str}");
		$qry="INSERT INTO players(mbno,name,photoname,type,year,achvmnts,skills) VALUES ('{$mbno}','{$name}','{$fn}','{$type}','{$year}','{$achvmnts}','{$skills}')";
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
							    window.location = '../index.html#rp1';},0);
								</script>";
					}
					 else
					 	echo"<script type='text/javascript'>
					window.setTimeout(function() { alert( 'Unknown Error...! Please try again..' );
				    window.location = '../index.html#rp1';},0);
					</script>";
				}
		}
else
{
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Profile Photo size must be less than or equal to 1mb ...!' );
    window.location = '../index.html#rp1';},0);
	</script>";
}
}
?>

