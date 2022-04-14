google.load("visualization", "1", {packages:["gauge", "table","corechart","bar"]});
function drawChart(cnt,labels,scores) {
		
		var la=new Array(cnt);
		var l2=new Array(2);
		l2=['\'Label\'', '\'Value\''];
		la [0]=l2;
		for(k=1;k<cnt;k++)
		{
		//alert(labels[(k-1)].replace(" ", "\n"));
		//labels[(k-1)]=labels[(k-1)].replace(" ", "\n");
		l2=[labels[(k-1)],scores [(k-1)]];
		la[k]=l2;
		}
		var data = google.visualization.arrayToDataTable(la);
		var options = {
          width: 650, height: 670,
          redFrom: 750, redTo: 1000,
          yellowFrom:500, yellowTo: 750,
          minorTicks: 5,max: 1000,
		  min: -30
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }

function drawChartb(labels,scores) {
	if (scores [2].toString().indexOf("Infinity") !=-1) {
		scores [2]=1000;
	}
	var la=new Array(3);//changeeee from 2
	var l2=new Array(3);//changeeee from 2
		l2=['\'Label\'', '\'Value\''];
		la [0]=l2;
		for(k=1;k<4;k++)//changeeee from 3
		{
		//alert(labels[(k-1)].replace(" ", "\n"));
		//labels[(k-1)]=labels[(k-1)].replace(" ", "\n");
		l2=[labels[(k-1)],scores [(k-1)]]; 
		la[k]=l2;
		}
		var data = google.visualization.arrayToDataTable(la);
		var options = {
          width: 400, height: 120,
          redFrom: 13, redTo: 20,
          yellowFrom:7, yellowTo: 13,
          minorTicks: 5,max: 20,
		  greenFrom: 0.1,greenTo: 1.1,
		  min: -0.5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
	  

function drawTable(cnt,labels,scores) {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Labels');
        data.addColumn('number', 'Scores');
		var la=new Array(cnt);
		var l2=new Array(2);
		for(k=0;k<cnt;k++)
		{
		l2=[""+labels[k]+"",scores [k]];
		la=l2;
		data.addRows([la]);
		}
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true});
    }

function drawTableb(lb,scores) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Labels');
        data.addColumn('string', 'Scores');
		var la=new Array(3);//changeDths from 2
		var l2=new Array(3);//changeDths from 2
		for(k=0;k<3;k++)//changeDths from 2
		{
		l2=[""+lb[k]+"",scores [k]];
		//alert(l2);
		la=l2;
		data.addRows([la]);
		}
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true});
    }	
	
function drawlChartfull(tp,results,fileLns) {
		//inplns->values
		//flns->file lines
		var data = new google.visualization.DataTable();
if(tp==1){
		data.addColumn('string', 'X');
		var lebls=results [2] [1].length;
		//alert(lebls);
		for(fl=0;fl<lebls;fl++)
		{
		data.addColumn('number',results [0] [1] [fl]);
		}
		var la=new Array(28);
		var l2=new Array(29);
		for(fl=0;fl<fileLns;fl++)
		{
		l2=[""+fl+"",results [fl] [2] [0],results [fl] [2] [1],results [fl] [2] [2],results [fl] [2] [3],results [fl] [2] [4],results [fl] [2] [5],results [fl] [2] [6],results [fl] [2] [7],results [fl] [2] [8],results [fl] [2] [9],results [fl] [2] [10],results [fl] [2] [11],results [fl] [2] [12],results [fl] [2] [13],results [fl] [2] [14],results [fl] [2] [15],results [fl] [2] [16],results [fl] [2] [17],results [fl] [2] [18],results [fl] [2] [19],results [fl] [2] [20],results [fl] [2] [21],results [fl] [2] [22],results [fl] [2] [23],results [fl] [2] [24],results [fl] [2] [25],results [fl] [2] [26],results [fl] [2] [27]];
		//alert(l2);
		//alert(l2.length);
		la=l2;
		data.addRows([la]);
		}
		//var data = google.visualization.arrayToDataTable(la);
		var options = {
		curveType: 'function',
         legend: { position: 'bottom' },
        hAxis: {
          title: 'Values'
        },
        vAxis: {
          title: 'Score'
        },
        backgroundColor: '#f1f8e9'
      };

}
else if(tp==2){		
		data.addColumn('string', 'X');
		data.addColumn('number', 'Original Value');
		data.addColumn('number', 'Score');
		var la=new Array(4);//change from 2
		var l2=new Array(4);//change from 3
		
		//document.getElementById('trala').value=results [1] [1];
		for(fl=0;fl<fileLns;fl++)
		{
		if (results [fl] [3].toString().indexOf("Infinity") !=-1) {
			results [fl] [3]=1000;
		}
		l2=[""+fl+"",parseFloat(results [fl] [2]),parseFloat(results [fl] [3])];
		//alert(l2);
		la=l2;
		data.addRows([la]);
		}
		//var data = google.visualization.arrayToDataTable(la);
		
		var options = {
		curveType: 'function',
         legend: { position: 'bottom' },
        hAxis: {
          title: 'Values'
        },
        vAxis: {
          title: 'Score'
        },
        backgroundColor: '#f1f8e9'
      };
}
        /*var data = google.visualization.arrayToDataTable([
          ['file lines', 'values'],
          ['2004',  1000],
          ['2005',  1170],
          ['2006',  660],
          ['2007',  1030]
        ]);*/

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
function drawresch(linenm,tp,resl) {
      
	  var data = new google.visualization.DataTable();
      
	  if(tp==1)
	  {
		data.addColumn('string', 'Labels');
        data.addColumn('number', 'Scores');
		var la=new Array(2);
		var l2=new Array(2);
		//document.getElementById('trala').value=resl [linenm] [1] [0];
		for(k=0;k<28;k++)
		{
		l2=[""+resl [linenm] [1] [k]+"",resl [linenm] [2] [k]];
		la=l2;
		data.addRows([la]);
		}
		var options = {
          'width': 600, 'height': 120
		  };
		var options2 = {
          width: 600, height: 320,
          redFrom: 0.9, redTo: 1,
          yellowFrom:0.7, yellowTo: 0.9,
          minorTicks: 5,max: 1,
		  min: -1
        };

      var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	  chart.draw(data, options);
	  chart2.draw(data, options2);
		}
	  else if(tp==2)
		{
		if (resl [linenm] [3].toString().indexOf("Infinity") !=-1) {
			resl [linenm] [3]=1000;
		}
		
		//normal score , annormal score custom  labels defined here!!!
		//lb scores
		//alert(resl [linenm]);
		var lb=['Type','Value sent','Score get'];
		data.addColumn('string', 'Labels');
        data.addColumn('number', 'Scores');
		var la=new Array(2);//chane from 2
		var l2=new Array(2);//change from 2
		//works
		//l2=[""+lb[0]+"",resl [linenm] [1]];
		//alert(resl [linenm] [1]);
		//la=l2;
		//data.addRows([la]);
		l2=[""+lb[1]+"",parseFloat(resl [linenm] [2])];
		la=l2;
		data.addRows([la]);
		l2=[""+lb[2]+"",parseFloat(resl [linenm] [3])];
		la=l2;
		data.addRows([la]);
		//alert(resl [linenm]);
		//document.getElementById('trala').value=lb [1];
		/*for(k=0;k<3;k++)//change from 3
		{
		l2=[""+lb[k]+"",resl [linenm] [(k+1)]];
		la=l2;
		data.addRows([la]);
		}*/
		var options = {
          width: 400, height: 120,
		  title: 'Type: '+resl [linenm] [1],
          redFrom: 13, redTo: 20,
          yellowFrom:7, yellowTo: 13,
          minorTicks: 5,max: 20,
		  greenFrom: 0.1,greenTo: 1.1,
		  min: -0.5
        };

      var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	  chart.draw(data, options);
	  chart2.draw(data, options);
	  }
      //chart.draw(data, options);
	  
    }
function drawinputhistogram(lbls)
{
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Lables');
	data.addColumn('number', 'Values');
   // var la=new Array(2);
	
	//for(k=0;k<cn;k++)
	//{
		//la[0]=lbls[k];
		//la[1]=parseFloat(vals[k]);
		data.addRows(lbls);
		
		//}
	var options = {
    title: 'Input data file Histogramm',
    legend: { position: 'none' },
    colors: ['#4285F4'],

    chartArea: { width: 401 },    bar: { gap: 0 },
	histogram: {
      maxValue: 182
    }
  };
  //alert(JSON.parse(lbls));
  var chart = new google.visualization.Histogram(document.getElementById('curve_chart'));
	chart.draw(data, options);
	
	}

function drawoutputchart(datsr,datswr)
{
	var data = new google.visualization.DataTable();
	var datap = new google.visualization.DataTable();
	datap.addColumn('string', 'Ansers');
	datap.addColumn('number', 'numbers');
	var datsp=new Array(2);
	datsp=["Ringt Answers",(datsr/(datsr+datswr))];
	datap.addRows([datsp]);
	datsp=["Wrong Answers",(datswr/(datsr+datswr))];
	datap.addRows([datsp]);
	data.addColumn('string', 'Answers');
	data.addColumn('number', '#');
	var dats=new Array(2);
	dats=["Ringt Answers",datsr];
	data.addRows([dats]);
	dats=["Wrong Answers",datswr];
	data.addRows([dats]);
	var options = {
    title: 'Result data',
    legend: { position: 'none' },
    colors: ['#4285F4']
  };
	var chart = new google.visualization.ColumnChart(document.getElementById('out_chart'));
	var chart2 = new google.visualization.PieChart(document.getElementById('out_chart2'));
	chart.draw(data, options);
		chart2.draw(datap, options);
	
	}