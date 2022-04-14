<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διπλωματική Εργασία-Φόρμα Επίδειξης και Δοκιμών</title>
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/shadowbox.css">
<script type="text/javascript" src="../js/shadowbox.js"></script>
<script type="text/javascript" src="../js/utilities.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="../js/charts.js"></script>
<script type="text/javascript" src="../js/charts.js"></script>
</head>

<body>
<?php
//session_start();
//pairnei mia gramh apo ta $results (to apotelemsa kai tis etiketes)
//tp=1 clasy
//tp=2 anomaly
//normal score , annormal score custom
//$_GET["tp"];
$arRes=json_decode($_GET["resl"]);
//print_r($arRes);
$arRes=json_encode($arRes);
$arRes=$_SESSION["results"];//tropopoihsh
//$nm=count($arRes [0]);
//print_r($nm);
$var=$_GET["var"]+1;
echo '<h3>Αποτελεσματα '.$var.' γραμμης </h3>';
//problhma passing results
echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawresch('.$_GET["var"].','.$_GET["tp"].','.$arRes.');});</script>';
//echo $_GET["tp"];
if($_GET["tp"]==2)
{echo '<div id="chart_div" style="width: 620px; height: 120px"></div>
<div id="chart_div2"></div>';}
elseif($_GET["tp"]==1)
{echo '<div id="chart_div" style="width: 900px; height: 500px"></div>
<div id="chart_div2" style="width: 500px; height: 220px"></div>';}
?>

</body>
</html>