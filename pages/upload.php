<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Οδηγίες Χρήσης</title>
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="right">
<h2><a>Ανέβασμα αρχείου</a></h2>
<div class="articles">
*Το αρχείο πρέπει αν είναι κατάληξης .dat και να περιέχει τις τιμές μία κάτω απο την άλλη.
<br/>
<form id="form" action="upload.php" method="post" enctype="multipart/form-data">
<h3>Αρχείο τιμών</h3>
<br/>
<input type="file" name="file" value=".dat file" />
<br/>
<br/>
<input class="bt" type="submit" value="ανέβασμα" name="submit"/>
</form>
<br/>
</div>
</div>
</body>
</html>
<?php
if (!isset($_FILES["file"]))
{
//If not isset -> set with dumy value
$_FILES["file"] = "undefine";

}
else if ($_FILES["file"]["error"] > 0)
	  {
		  echo "Error: " . $_FILES["filen"]["error"] . "<br />";
		  echo '<script type="text/javascript">alert("Δεν δώσατε κάποιο αρχείο");</script>';
	  }
else{
		  $directory="../files/upload";
		  $sourc=''.$directory.'/'.$_FILES["file"]["tmp_name"].'';
		  if(move_uploaded_file($_FILES["file"]["tmp_name"],"$directory/".$_FILES["file"]["name"]))//;
		  {
	    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		//echo "Type: " . $_FILES["file"]["type"] . "<br />";
		//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		//echo "Stored in: " . $_FILES["file"]["tmp_name"];
		//echo "$directory/".$_FILES["file"]["name"];
		echo '<script type="text/javascript">alert("Το ανέβασμα ολοκληρώθηκε"); self.parent.Shadowbox.close();</script>';
		 }
		//header('location: ../graph.php?file='.$_FILES["filen"]["name"].'');
		  //$fnam=$_FILES["filen"]["tmp_name"];
		  //$myfile = fopen($sourc, "r") or die("Unable to open file!");
		  //echo fread($myfile,filesize("webdictionary.txt"));
		  //fclose($myfile);
}
?>