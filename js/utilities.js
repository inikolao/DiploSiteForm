function disprotect() {
document.getElementById("sb-nav-close").disabled=true;
return false;
};

function clasification() {

return false;
};
function AnomalyDet() {

return false;
};
function protection() {
    // open ASA the window loads
	Shadowbox.init({
    // skip the automatic setup,
	listenOverlay: false,
	enableKeys: false,
	});
	//document.getElementById("sb-nav-close").disabled=true;
	Shadowbox.open({
        content:    'pages/entry.php',
		player:     "iframe",
		title:      "Entry Control",
		height:     520,
		width:      600,
		options: {
        modal:   true,
		onOpen: function(){ document.getElementById("sb-nav-close").style.visibility = "hidden";}, 
		onClose: function(){ alert('Closed!');} 
        } 
		});
return false;
};
function live() {
    // open ASA the window loads
	Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
	height:     520,
    width:      520,
    skipSetup: true
});
    Shadowbox.open({
        content:    'pages/live.php',
		player:     "iframe",
		title:      "Live Results",
		modal: true,
		});
return false;
};

function upload() {
    // open ASA the window loads
	Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
	
    //skipSetup: true
});
    Shadowbox.open({
        content:    'pages/upload.php',
		player:     "iframe",
		title:      "Ανέβασμα .dat αρχείου.",
		height:     520,
		width:      600,
		//modal: true,
		});
return false;
};

function credits() {
Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
    //skipSetup: true
});
    // open ASA the window loads
    Shadowbox.open({
        content:    'pages/credits.php',
		player:     "iframe",
		title:      "Credits",
		height:     420,
		width:      320,
		modal: true,
		});
return false;
};

function credits2() {
Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
    //skipSetup: true
});
    // open ASA the window loads
    Shadowbox.open({
        content:    'credits.php',
		player:     "iframe",
		title:      "Credits",
		height:     420,
		width:      320,
		modal: true,
		});
return false;
};

function help() {
Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
    //skipSetup: true
});
    // open ASA the window loads
    Shadowbox.open({
        content:    'pages/help.php',
		player:     "iframe",
		title:      "Βοήθεια",
		height:     520,
		width:      600,
		modal: true,
		});
return false;
};

function reults(tp,vl,resl) {
/*alert(resl[(vl-1)]);
alert(resl[(vl-1)] [0]);
var arRes = new Array();
arRes=resl;
alert(arRes);
alert(arRes[(vl-1)]);*/
Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
    //skipSetup: true
});
    // open ASA the window loads
	//missing array-> resl (kanei passing string)<-lathaki
	resl=0;//tropopoihsh
if(tp==1)
{	
    Shadowbox.open({
        content:    'results.php?var='+(vl-1)+'&tp='+tp+'&resl='+JSON.stringify(resl)+'',
		player:     "iframe",
		title:      "Αποτελέσματα",
		height:     520,
		width:      800,
		modal: true,
		});
		}
else if(tp==2)
{	
	Shadowbox.open({
        content:    'results.php?var='+(vl-1)+'&tp='+tp+'&resl='+JSON.stringify(resl)+'',
		player:     "iframe",
		title:      "Αποτελέσματα",
		height:     520,
		width:      600,
		modal: true,
		});

}
return false;
};
function histoio(tps)
{
	
	Shadowbox.init({
    // skip the automatic setup
	listenOverlay: false,
    //skipSetup: true
});
    // open ASA the window loads
    Shadowbox.open({
        content:    'histoIO.php?tp='+tps+'',
		player:     "iframe",
		title:      "Ιστογράμματα",
		height:     520,
		width:      600,
		modal: true,
		});
return false;
	
	}
function formch(ck){
if((document.getElementById("var").value=="Τιμή")||(document.getElementById("var").value==""))
{	if(ck==1)
	{document.getElementById("var").value="";}
	else if(ck==2)
	{document.getElementById("var").value="Τιμή";}
	}
};
function rdch(ch){
if(document.getElementById("rd1").checked==true)
{
	document.getElementById("var").disabled=true;
	}
else
{ document.getElementById("var").disabled=false;}
};
function mixedch(){
if((document.getElementById("critical").selected==true)&&(document.getElementById("rd2").checked==true))
{
	alert("error: You can not Send Mixed values in Form Mode");
	document.getElementById("sbbbt").disabled=true;
	}
else{document.getElementById("sbbbt").disabled=false;}	
	};
