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
<h2><a>Anomaly Detection</a></h2>
<form id="form" action="pages/graph.php?tp=2" method="post">
<h3>Φορμα καταχώρησης τιμής προς έλεγχο</h3>
<br/>
<input type="text" name="var" value="Τιμή" id="var" onclick="formch(1);" onblur="formch(2);" />
<br/>
<br/>
<input type="radio" id="rd1" name="option" checked="checked" onclick="rdch();" value="1">File<br>
<input type="radio" id="rd2" name="option"  onclick="rdch();" value="2">Form
<br/>
<br/>
<select name="type" onchange="mixedch();"><?php $service_url = "http://dark.nikolao.info:8080/clasify?value=25";
		$curl = curl_init($service_url);
	 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 	$curl_response = curl_exec($curl);
	 	if ($curl_response === false) {
		 $info = curl_getinfo($curl);
		 curl_close($curl);
		 die('error occured during curl exec. Additioanl info: ' . var_export($info));
		 }
		curl_close($curl);
		//what ansered!
		$decoded = json_decode($curl_response);
		$exp = json_decode($curl_response,true);
		if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
			die('error occured: ' . $decoded->response->errormessage);
		}
		//graph
		$id=$exp['id'];
		echo "<br />id:".$id;
		$labs=$exp['results'];
		//print_r($labs);
		$labsn=count($labs [0]);
		//echo "<br />".$labsn;
		for($d=0;$d<$labsn;$d++){
		//echo "<br />".$labs [0] [$d] ['label'];
		//echo "<br />".$labs [0] [$d] ['score'];
		$lb[$d]=$labs [0] [$d] ['label'];
		$lbsc[$d]=$labs [0] [$d] ['score'];
		}
		$lbb=json_encode($lb);
		for($e=0;$e<$labsn;$e++)
		{echo '<option value="'.$lb[$e].'">'.$lb[$e].'</option>';} ?><option id="critical" value="all.dat">Mixed Types</option></select>
<br/>
<br/>
<input class="bt" type="submit" id="sbbbt" value="Καταχώρηση" name="submit"/>
</form>
<br/>
</div>
<div id="left"> 

<h3>Menu</h3>
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