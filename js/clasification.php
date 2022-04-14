<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διπλωματική Εργασία-Φόρμα Επίδειξης και Δοκιμών</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/shadowbox.css">
<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript" src="js/utilities.js"></script>
</head>

<body onload="rdch();">

<div id="wrap">

<div id="header">
<h1><a>Ιωάννης Νικολάου</a><img src="files/images/me.jpg" /></h1>
<h2>Διπλωματική Εργασία</h2>
<h2>Φόρμα Επίδειξης και Δοκιμών</h2>
</div>

<div id="right">
<h2><a>Clasification</a></h2>
<form id="form" action="pages/graph.php?tp=1" method="post">
<h3>Φορμα καταχώρησης τιμής προς έλεγχο</h3>
<br/>
<input type="text" name="var" value="Τιμή" id="var" onclick="formch(1);" onblur="formch(2);" />
<br/>
<br/>
<input type="radio" id="rd1" name="option" checked="checked" onclick="rdch();" value="1">File<br>
<input type="radio" id="rd2" name="option"  onclick="rdch();" value="2">Form
<br/>
<br/>
<select name="type" onchange="mixedch();">
<option id="critical" value="1">Mixed Types</option>
<option value="2">Simple Mode</option></select>
<br/>
<br/>
<input class="bt" type="submit" value="Καταχώρηση" id="sbbbt" name="submit"/>
</form>
<br/>
</div>
<div id="left"> 

<h3>Categories</h3>
<ul>
<li><a href="index.php">Αρχική Σελίδα</a></li>
<li><a href="clasification.php">Clasification</a></li> 
<li><a href="anomaly.php">Anomaly Detection</a></li>
<li>&nbsp;</li> 
</ul>

<h3>Utilities</h3>
<ul>
<li><a href="" onclick="return upload();">File Upload</a></li>
<li><a href="" onclick="return help();">Οδηγίες Χρήσης</a></li>
</ul>

<h3>And More</h3>
<ul>
<li><a href=""  onclick="return credits();">Credits</a></li>
</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a>, Thanks to <a href="http://www.openwebdesign.org/">Web Design Firm</a>
</div>
</div>


</body>
</html>