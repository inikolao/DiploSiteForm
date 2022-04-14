<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διπλωματική Εργασία-Φόρμα Επίδειξης και Δοκιμών</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/shadowbox.css">
<script type="text/javascript" src="../js/shadowbox.js"></script>
<script type="text/javascript" src="../js/utilities.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="../js/charts.js"></script>
<script type="text/javascript"></script>
</head>

<body>

<div id="wrap">

<div id="header">
<h1><a>Ιωάννης Νικολάου</a><img src="../files/images/me.jpg" /></h1>
<h2>Διπλωματική Εργασία</h2>
<h2>Φόρμα Επίδειξης και Δοκιμών</h2>
</div>

<div id="right">

<h2><a>Αποτελέσματα</a></h2>
<?php
ini_set('max_execution_time', 0);
if (!isset($_POST["option"]))
{
//If not isset -> set with dumy value
$_POST["option"] = "undefine";
}
if (!isset($_GET["tp"]))
{
//If not isset -> set with dumy value
$_GET["tp"] = "undefine";
}
$_SESSION["mixed"]="un";
if($_GET["tp"]==1)
{
	//echo $_GET["tp"];
	 if($_POST["option"]==1)
		{//file
		//$results=array(array(),array(),array());
		$dir    = '../files/upload/';
		$files = scandir($dir, 1);
		$k=count($files);
		echo "<br />Arxeia p uparxoun".($k-2)."<br />";
		$lns=0;
		$controlod=-1;
		for($j=0;$j<($k-2);$j++)
		{
		$file = fopen("../files/upload/".$files[$j]."", "r");
		while(!feof($file)){
			if($_POST["type"]==1){
													$line = fgets($file);
													$line = preg_replace('/\n$/','',$line);
													$line=explode(",",$line);
													//echo "koita! ".$_POST["type"];
													//break;
													//echo "First (etiketa): ".$line [0]." Second (value): ".$line[1];
													//break;
													$service_url = "http://dark.nikolao.info:8080/clasify?value=".$line[1]."";
													$controlod=1;
													$_SESSION["mixed"]=1;
													}
		 else{
			 $_SESSION["claslb"]=$_POST["type"];
			 $_SESSION["mixed"]=2;
			 $line = (float)fgets($file);
    		//echo "i line".$line;
			$line = preg_replace('/\n$/','',$line);
			//progress line
			//ini_set('max_execution_time', 300);
			$service_url = "http://dark.nikolao.info:8080/clasify?value=".$line."";}
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
			//$id=$exp['id'];
			//echo "<br />id:".$id;
			$labs=$exp['results'];
			//print_r($labs);
			$labsn=count($labs [0]);
			//echo "<br />".$labsn;
			for($d=0;$d<$labsn;$d++){
				//echo "<br />".$labs [0] [$d] ['label'];
				//echo "<br />".$labs [0] [$d] ['score'];
			if($lns==0)
			{$lb[$d]=$labs [0] [$d] ['label'];}
			
			$lbsc[$d]=$labs [0] [$d] ['score'];
			}
			//$lbb=json_encode($lb);
			//$lbscb=json_encode($lbsc);
			//etiketes kai score gia kathe line-> kako... nta nta...!!!
			if($controlod==1)
			{$tbl[]=$line[1];
			$resultsCl[$lns] [0]=$line[1];}
			else{
				$tbl[]=$line;
			$resultsCl[$lns] [0]=$line;}
			$resultsCl[$lns] [1]=$lb;
			$resultsCl[$lns] [2]=$lbsc;
			$lns++;//25
			if($lns==59560){break;}
			}
		fclose($file);
		}
		//print_r($results);
		//final array [value, label[28],score [28]]-> array size [file lines]
		//$results=json_encode($results);
		$resultsCl=json_encode($resultsCl);
		$_SESSION["results"]=$resultsCl;//tropopoihsh
		$resultsCl=str_replace('"','\'',$resultsCl);
		//passing error or missing!
		echo "file lines:".$lns;
		//i want 
		/*echo "Histogram of input data <br/><br/>";
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawinputhistogram(3); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div><br/>';*/
		echo '<form id="form" action="" method="post">
		<h3>Φορμα εύρεσης αποτελεσμάτων</h3>
<br/> LineNumber: <input type="number" value="1" name="var" id="var" min="1" max="'.$lns.'">
<br/><br/>
<input class="bt" type="submit" value="Καταχώρηση" onclick="return reults(1,document.getElementById(\'var\').value,'.$resultsCl.');" name="submit"/></form>';
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawlChartfull(1,'.$resultsCl.','.$lns.'); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div>';
		/*echo "<br/>Histogram of Result data <br/><br/>";
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawoutputhistogram(3); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div><br/>';*/
			}
	 else if($_POST["option"]==2)
		{//form
					 $_SESSION["mixed"]="un";
		//$service_url = "https://www.google.com/imghp?hl=en&tab=".$_POST["var"]."";
		$service_url = "http://dark.nikolao.info:8080/clasify?value=".$_POST["var"]."";
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
		$lbscb=json_encode($lbsc);
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawTable('.$labsn.','.$lbb.','.$lbscb.'); drawChart('.$labsn.','.$lbb.','.$lbscb.'); });</script>';
		echo '<div id="table_div"></div>';
		echo '<br /><h2><a>Visualasation</a></h2>';
 		echo '<br /><div id="chart_div" style="width: 500px; height: 720px;"></div>';
			}
	}
else if($_GET["tp"]==2)
{
	echo $_GET["tp"];
	 if($_POST["option"]==1)
		{//file
		$dir    = '../files/upload/';
		$files = scandir($dir, 1);
		$k=count($files);
		//echo "<br />".($k-2);
		$lns=0;
		$controlod=-1;
		for($j=0;$j<($k-2);$j++)
		{
		$file = fopen("../files/upload/".$files[$j]."", "r");
		while(!feof($file)){
			$line = fgets($file);
			$line = preg_replace('/\n$/','',$line);
    		//echo $line;
			//ini_set('max_execution_time', 300);
			if(strcmp($_POST["type"],"all.dat")==0){
													$line=explode(",",$line);
													//echo "First (etiketa): ".$line [0]." Second (value): ".$line[1];
													$service_url = "http://nikolao.info:8080/anomaly?type=".$line[0]."&value=".$line[1]."";
													$controlod=1;
													$_SESSION["mixed"]=1;}
		 else{
			 $_SESSION["mixed"]=2;
			# do same stuff with the $line
			//$service_url = "http://192.168.2.5:8080/anomaly?value=".$line."&type=".$_POST["type"]."";
			$service_url = "http://nikolao.info:8080/anomaly?type=".$_POST["type"]."&value=".$line."";}
			$curl = curl_init($service_url);
	//		curl_setopt($ch,CURLOPT_URL,$url);
		 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
	 		$curl_response = curl_exec($curl);
			if(curl_errno($curl)){
    		echo 'Curl error: ' . curl_error($curl);}
	 		if ($curl_response == false) {
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
			//print_r($curl_response);
			//help code
	//		$exph='{"id":16,"content":["normalScore:, 1.000000!","abnormalScore:, 1.000000!"]}';
		//	$exp=json_encode($exph);
			//print_r($exp);
			//helpcode end
			//echo "<br />id:".$id;
			//echo "<br />type:".$_POST["type"];
			//echo "<br />";
			$labs=$exp['content'];
			//print_r($labs);
			list($scoreV,$scoreN) = explode(',', $labs [0]);
			list($abscoreV,$abscoreN) = explode(',', $labs [1]);
			list($abscoreV2,$abscoreN2) = explode(',', $labs [2]);
			$lbls [0]=$scoreV;
			$lbls [1]=$abscoreV;
			$lbls [2]=$abscoreV2;
			
			$lblsN [0]=$scoreN;
			$lblsN [1]=$abscoreN;
			$lblsN [2]=$abscoreN2;
			/*if (strpos($lblsN [0],' Infinity') !== false) {
		    	//echo 'true';
				$lblsN [0]=10;
			}*/
			//print_r($lblsN);
			//$lbls=json_encode($lbls);
			//$lblsN=json_encode($lblsN);
			//etiketes kai score gia kathe line
			if($controlod==1)
			{$tbl[$lns]=$line[1];
			$resultsAn[$lns] [0]=$line[1];
			}
			else{$tbl[$lns]=$line;
			//$resultsAn[$lns] [0]=($lns+1);
			$resultsAn[$lns] [0]=$line;}
			$resultsAn[$lns] [1]=$scoreN;
			$resultsAn[$lns] [2]=$abscoreN;
			$resultsAn[$lns] [3]=$abscoreN2;
			$lns++;
			if($lns==10)
				{break;}
			
			}
		fclose($file);
		}
		//
		//final array [value, label[28],score [28]]-> array size [file lines]
		$resultsAn=json_encode($resultsAn);
		$_SESSION["results"]=$resultsAn;
		$resultsAn=str_replace('"','\'',$resultsAn);
		echo "file lines:".$lns;
		echo "<br />type:".$_POST["type"];
		echo '<form id="form" action="" method="post">
		<h3>Φορμα εύρεσης αποτελεσμάτων</h3>
<br/> LineNumber: <input type="number" value="1" name="var" id="var" min="1" max="'.$lns.'">
<br/><br/>
<input class="bt" type="submit" value="Καταχώρηση" onclick="return reults(2,document.getElementById(\'var\').value,'.$resultsAn .');" name="submit"/></form>';
	echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawlChartfull(2,'.$resultsAn.','.$lns.'); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div>';
			}
	 else if($_POST["option"]==2)
		{//form
		$_SESSION["mixed"]="un";
		//$service_url = "https://www.google.com/imghp?hl=en&tab=".$_POST["var"]."";
		//$service_url = "http://192.168.2.5:8080/anomaly?value=".$_POST["var"]."&type=".$_POST["type"]."";
		$service_url = "http://nikolao.info:8080/anomaly?type=".$_POST["type"]."&value=".$_POST["var"]."";
		$curl = curl_init($service_url);
//		curl_setopt($ch,CURLOPT_URL,$url);
	 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
	 	$curl_response = curl_exec($curl);
//		print_r($curl_response);
/*		if(curl_errno($curl)){
    	echo 'Curl error: ' . curl_error($curl);}*/
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
		//print_r($curl_response);
		//help code
//		$exph='{"id":16,"content":["normalScore:, 1.000000!","abnormalScore:, 1.000000!"]}';
	//	$exp=json_encode($exph);
		//print_r($exp);
		//helpcode end
		$id=$exp['id'];
		echo "<br />id:".$id;
		echo "<br />type:".$_POST["type"];
		echo "<br />";
		$labs=$exp['content'];
		//print_r($labs);
		list($scoreV,$scoreN) = explode(',', $labs [0]);
		list($abscoreV,$abscoreN) = explode(',', $labs [1]);
		list($abscoreV2,$abscoreN2) = explode(',', $labs [2]);
		$lbls [0]=$scoreV;
		$lbls [1]=$abscoreV;
		$lbls [2]=$abscoreV2;
		
		$lblsN [0]=$scoreN;
		$lblsN [1]=$abscoreN;
		$lblsN [2]=$abscoreN2;
		/*if (strpos($lblsN [0],' Infinity') !== false) {
		    //echo 'true';
			$lblsN [0]=10;
		}*/
		//print_r($lbls);
		$lbls=json_encode($lbls);
		$lblsN=json_encode($lblsN);
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawTableb('.$lbls.','.$lblsN.'); drawChartb('.$lbls.','.$lblsN.'); });</script>';
		echo '<div id="table_div"></div>';
		echo '<br /><h2><a>Visualasation</a></h2>';
		echo '<div id="chart_div" style="width: 400px; height: 120px;"></div>';
			}
	}
?>
</div>
<div id="left"> 
  
  <h3>Categories</h3>
<ul>
<li><a href="../index.php">Αρχική Σελίδα</a></li>
<li><a href="../clasification.php">Clasification</a></li> 
<li><a href="../anomaly.php">Anomaly Detection</a></li>
<li>&nbsp;</li>  
</ul>

<h3>Utilities</h3>
<ul>
<li><a href="#odig">Οδηγίες Χρήσης</a></li>
<li><a href="" disabled="yes" onclick="return histoio(<?php echo $_GET["tp"]; ?>);">Ιστογράματα Εισόδου</a></li>
<li><a href="">Xml Αποτελεσμάτων Download</a></li> 
</ul>

<h3>And More</h3>
<ul>
<li><a href=""  onclick="return credits2();">Credits</a></li>
</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a>, Thanks to <a href="http://www.openwebdesign.org/">Web Design Firm</a>
</div>
</div>


</body>
</html>