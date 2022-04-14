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
</head>

<body>
<?php
//session_start();
//pairnei mia gramh apo ta $results (to apotelemsa kai tis etiketes)
//tp=1 clasy
//tp=2 anomaly
//normal score , annormal score custom
if (!isset($_GET["tp"]))
{
//If not isset -> set with dumy value
$_GET["tp"] = "undefine";
}
//$arRes=json_decode($_GET["resl"]);//ch
//print_r($arRes);
//$arRes=json_encode($arRes);//ch
$arRes=$_SESSION["results"];//tropopoihsh
//$nm=count($arRes [1]);
//print_r($arRes);
////$var=$_GET["var"]+1;
if($_GET["tp"]==1){
					$resultArray=explode("]],[",$arRes);//diaxwrizw kathe apotelesma
					$szl=count($resultArray);//arithmos timwv pou steilame
					for($j=0;$j<$szl;$j++)
					{
						$help1=explode("],[",$resultArray [$j]);//diaxwrismos timhs/etiketvn(help1[0] apo ta skores help1[1]
						$help=explode(",[\"",$help1[0]);//diaxwrismos timhs apo tis etiketes 
						$resarrs[$j] [0]=$help[0];
						$resarrs[$j] [1]=explode("\",\"",$help[1]);//diaxwrismos etiketvn
						$resarrs[$j] [2]=explode(",",$help1[1]);//diaxwrismos scores
						$resarrs[$j] [1] [27]=str_replace('"','',$resarrs[$j] [1] [27]);
					}
					$resarrs[0] [0]=str_replace('[[','',$resarrs[0] [0]);
					$resarrs[$szl-1] [2] [27]=str_replace(']]]','',$resarrs[$szl-1] [2] [27]);
					for($j=0;$j<$szl;$j++)
					{
						$maxcore = array_search(max($resarrs[$j] [2]), $resarrs[$j] [2]);
						//echo "original res: ".print_r($resarrs[$j] [2])."";
						//echo "we get:".max($resarrs[$j] [2])." so exoume: ".$resarrs[$j] [1] [$maxcore]."<br/>";
						$clasresult[$j]=$resarrs[$j] [1] [$maxcore];
					}
					//print_r($clasresult);
					if($_SESSION["mixed"]==1)
						{
							$dir    = '../files/upload/';
							$files = scandir($dir, 1);
							$file = fopen("../files/upload/".$files[0]."", "r");
							$lns=0;
						while(!feof($file)){
								$line = fgets($file);
								$line = preg_replace('/\n$/','',$line);
								$line=explode(",",$line);
								$line[1]=(float)$line[1];
								//echo "First (etiketa): ".$line [0]." Second (value): ".$line[1];
								$labelded [$lns]=$line;//labeled values array
								$justlabels [$lns]=$line[0];//just jthe labels
								$justvalues[$lns]=$line[1];//just the values
								$lns++;
								//if($lns==259560){break;}
								if($lns==$szl){break;}
								}
						$cnts=count($clasresult);
						$right=0;
						$wrong=0;
						for($j=0;$j<$cnts;$j++)
							{
								if(strcmp($justlabels[$j],$clasresult[$j])==0)
									{
										$right++;
									}
								else{
										$wrong++;
									}	
							}
	
						}
					else
					{	
					$labeltp=$_SESSION["claslb"];
					$dir    = '../files/upload/';
					$files = scandir($dir, 1);
					$file = fopen("../files/upload/".$files[0]."", "r");
					$lns=0;
					while(!feof($file)){
						$line = fgets($file);
						$line = preg_replace('/\n$/','',$line);
						$helpp[0]=$labeltp;
						$helpp[1]=(float)$line;
						//echo "First (etiketa): ".$helpp [0]." Second (value): ".$helpp[1];
						$labelded [$lns]=$helpp;//labeled values array
						$justlabels [$lns]=$helpp[0];//just jthe labels
						$justvalues[$lns]=$helpp[1];//just the values
						$lns++;
						//if($lns==259560){break;}
						if($lns==$szl){break;}
						}
					$cnts=count($clasresult);
					$right=0;
					$wrong=0;
					for($j=0;$j<$cnts;$j++)
					{
						if(strcmp($labeltp,$clasresult[$j])==0)
						{
							$right++;
						}
						else{
							$wrong++;
							}	
					}
	
	
				}
}
else if($_GET["tp"]==2){
				$resultArray=explode("],[",$arRes);//diaxwrizw kathe apotelesma
				//print_r($resultArray);
				echo "<br/>";
				$szl=count($resultArray);//arithmos timwv pou steilame
				for($j=0;$j<$szl;$j++)
					{
						$resarrs[$j]=explode("\",\"",$resultArray[$j]);
						$resarrsan[$j] [0]=$resarrs[$j] [1];
						$resarrsan[$j] [1]=$resarrs[$j] [2];
						$resarrsan[$j] [2]=(float)str_replace('"','',$resarrs[$j] [3]);
						//echo "First (etiketa): ".$resarrsan[$j] [0]." ,Second (value): ".$resarrsan[$j] [1]." ,Third (value):  ".$resarrsan[$j] [2]."<br/>";
					}
				$resarrsan[$szl-1] [2]=str_replace(']]','',$resarrsan[$szl-1] [2]);
//				print_r($resarrsan);
				if($_SESSION["mixed"]==1)
						{
							$dir    = '../files/upload/';
							$files = scandir($dir, 1);
							$file = fopen("../files/upload/".$files[0]."", "r");
							$lns=0;
						while(!feof($file)){
								$line = fgets($file);
								$line = preg_replace('/\n$/','',$line);
								$line=explode(",",$line);
								$line[1]=(float)$line[1];
								//echo "First (etiketa): ".$line [0]." Second (value): ".$line[1];
								$labelded [$lns]=$line;//labeled values array
								$justlabels [$lns]=$line[0];//just jthe labels
								$justvalues[$lns]=$line[1];//just the values
								$lns++;
								//if($lns==259560){break;}
								if($lns==$szl){break;}
								}
						$cnts=count($resarrsan);
						$right=0;
						$wrong=0;
						for($j=0;$j<$cnts;$j++)
							{
								if($resarrsan[$j][2]<1.5)
									{
										$right++;
									}
								else{
										$wrong++;
									}	
							}
							
	
						}
					else
					{	
					$labeltp=$_SESSION["claslb"];
					$dir    = '../files/upload/';
					$files = scandir($dir, 1);
					$file = fopen("../files/upload/".$files[0]."", "r");
					$lns=0;
					while(!feof($file)){
						$line = fgets($file);
						$line = preg_replace('/\n$/','',$line);
						$helpp[0]=$labeltp;
						$helpp[1]=(float)$line;
						//echo "First (etiketa): ".$helpp [0]." Second (value): ".$helpp[1];
						$labelded [$lns]=$helpp;//labeled values array
						$justlabels [$lns]=$helpp[0];//just jthe labels
						$justvalues[$lns]=$helpp[1];//just the values
						$lns++;
						//if($lns==259560){break;}
						if($lns==$szl){break;}
						}
					$cnts=count($resarrsan);
					$right=0;
					$wrong=0;
					for($j=0;$j<$cnts;$j++)
					{
						if($resarrsan[$j][2]<1.5)
						{
							$right++;
						}
						else{
							$wrong++;
							}	
					}
	
	
				}
				
}
//echo $_GET["tp"];
//print_r($justlabels[0]);
echo "Histogram of input data <br/><br/>";
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawinputhistogram('.json_encode($labelded).'); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div><br/>';
echo '<h3>Ορθότητα αποτελεσμάτων.</h3>';
echo '<h3>Σύνολο απεσταλθέντων τιμών:'.$lns.'</h3>';
echo "Comumn chart of output data <br/><br/>";
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawoutputchart('.$right.','.$wrong.'); });</script>';
		echo '<br /> <div id="out_chart" style="width: 550px; height: 500px"></div><br/>';
echo '<br /> <div id="out_chart2" style="width: 550px; height: 500px"></div><br/>';

//problhma passing results
/*
echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawresch('.$_GET["var"].','.$_GET["tp"].','.$arRes.');});</script>';
//echo $_GET["tp"];
if($_GET["tp"]==2)
{echo '<div id="chart_div" style="width: 620px; height: 120px"></div>
<div id="chart_div2"></div>';}
elseif($_GET["tp"]==1)
{echo '<div id="chart_div" style="width: 900px; height: 500px"></div>
<div id="chart_div2" style="width: 500px; height: 220px"></div>';}
		/*echo "<br/>Histogram of Result data <br/><br/>";
		echo '<script type="text/javascript">google.setOnLoadCallback(function() { drawoutputhistogram(3); });</script>';
		echo '<br /> <div id="curve_chart" style="width: 550px; height: 500px"></div><br/>';*/
?>

</body>
</html>