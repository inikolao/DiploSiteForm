<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Entry Control</title>
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="right">
<h2><a>Παρακαλώ δώστε τα στοιχεία σας</a></h2>
<div class="articles">
*Η συγκεκριμένη φόρμα εμανίζεται για την προστασία των server που λειτουργούν απο πίσω απο μή εξουσιοδοτημένη πρόσβαση.
<br/>
<form id="form" action="entry.php" method="post" enctype="multipart/form-data">
<h3>Username</h3>
<br/>
<input type="text" name="id" value="Username" />
<br/>
<br/>
<h3>Password</h3>
<br/>
<input type="password" name="pass" value="Password" />
<br/>
<br/>
<input class="bt" type="submit" value="Είσοδος" name="submit"/>
</form>
<br/>
</div>
</div>
</body>
</html>
<?php
$er=0;
if (!isset($_POST['id']))
{
//If not isset -> set with dumy value
$_POST['user'] = "undefine";
$er=1;
}

if (!isset($_POST['pass']))
{
//If not isset -> set with dumy value
$_POST['pass'] = "undefine";
$er=1;
}
$name = $_POST['id'];
$pass = $_POST['pass'];
echo $name."<br/>";
echo $pass."<br/>";
echo strcmp($name,"admin")."<br/>";
echo strcmp($pass,"survive")."<br/>";
echo $er."<br/>";
$ts1=strcmp($name,"admin");
$ts2=strcmp($pass,"survive");
if($ts1==0)
{
	if($ts2==0)
	{
	session_start();
	   $_SESSION['name']=$name;
	   echo'<script type="text/javascript">',
     'self.parent.Shadowbox.close();',
     '</script>';
	   //header('location: ../../../httpds/nikolao/php/home.php');
	   //header('location: https://home.ceidlive.com/');
	}
	else
	{
	$er=1;
	}
}
else
{
$er=1;
}
if($er==1)
{
//header('location: ../index.php');
}
?>